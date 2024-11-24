<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\bank;
use App\Models\bkash;
use App\Models\nagad;
use App\Models\Order;
use App\Models\transactions;
use App\Services\OrderService;
use App\Services\PackageService;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use PDF;
class HomeController extends Controller
{
    protected $packageService;
    protected $orderService;
    public function __construct(PackageService $packageService, OrderService $orderService)
    {
        $this->middleware(['auth','Setting']);
        $this->packageService = $packageService;
        $this->orderService = $orderService;
    }

    public function dashboard()
    {
        $data['page_title'] = "Dashboard";
        $data['total_order'] = Order::count('id');
        $data['total_income'] = transactions::sum('credit');
        $data['total_expense'] = transactions::sum('debit');
        return view('admin.dashboard.dashboard',$data);
    }
    public function editProfile()
    {
        $data['page_title'] = "Edit Your Profile";
        $data['user'] = User::findOrFail(Auth::user()->id);
        return view('admin.dashboard.edit-profile',$data);
    }
    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' =>'required|unique:users,phone,'.$user->id,
            'image' => 'image|mimes:jpg,png,jpeg',

        ]);
        $in = $request->only('name','email','phone','image');
        if ($request->hasFile('image'))
        {
            File::delete(public_path("images/user/$user->image"));
            $image = $request->file('image');
            $image_name = rand(00000,19999).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(215,215)->save(public_path("images/user/$image_name"));
            $in['image'] = $image_name;

        }
        $user->update($in);
        session()->flash('success','Profile Update successfully.');
        return redirect()->back();
    }

    public function changePassword ()
    {
        $data['page_title'] = "Change Password";
        return view('admin.dashboard.change-password',$data);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
        ]);
        try{

            DB::beginTransaction();
                $current_password = Auth::user()->getAuthPassword();
                $user = Auth::user();
                if (Hash::check($request->old_password, $current_password))
                {
                    $user->password = $request->password;
                    $user->save();
                    session()->flash('success','Password Change Successfully Done!');
                    return redirect()->back();
                }else{

                    session()->flash('error','Current Password Not Match');
                    return redirect()->back();
                }
            DB::commit();
        } catch (\PDOException $e) {
            DB::rollback();
            session()->flash('success',$e->getMessage());
        }

    }


    // order functions
    public function orderList()
    {
        $data['page_title'] = "Order List";
        $user               = auth()->user();
        $data['orders']     = $this->orderService->getUserOrders($user->id);
        return view('admin.dashboard.user-order-list',$data);
    }
    public function adminOrderList()
    {
        $data['page_title'] = "Order List";

        $data['orders']     = $this->orderService->getAllOrders();
        return view('admin.dashboard.admin-order-list',$data);
    }
    public function checkout($id)
    {
        $orderId = $this->orderService->orderId();
        $data['user']        = auth()->user();
        $data['page_title']  = "Checkout your Order!";
        $data['package']     = $this->packageService->editPackage($id);
        $data['orderSerial'] = Carbon::now(+6)->format('ymd').$id.$data['user']->id.$orderId; // year month day,package id, user id and last one is order table id
        return view('frontend.checkout',$data);
    }
    public function orderSubmit(OrderRequest $request)
    {
        $in     = $request->all();
        $in['total_amount'] = str_replace(',', '',$in['total_amount']);
        $user   = User::findOrFail($request->user_id);
        $user->name    = $request->name;
        $user->phone   = $request->phone;
        $user->address = $request->address;

        $user->save();
        if ($request->hasFile('image')) {
            // File::delete(public_path("images/user/$user->image"));
            $image = $request->file('image');
            $image_name = rand(00000, 19999) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(215, 215)->save(public_path("images/order/$image_name"));
            $in['image'] = $image_name;
        }

        $order = $this->orderService->storeOrder($in);
        session()->flash('success','Successfully Submit');
        // return redirect()->route('order-pdf',$order->order_id);
        return redirect()->route('userPaymentIndex',compact('order'));
    }
    public function userParyment(Request $request){
        $data['page_title'] = "payment";
        $data['orderId']= $request->query('order');
        $data['bkashData']= bkash::all();
        $data['nagadData']= nagad::find(1);
        $data['bankData']= bank::find(1);
        return view('frontend.payment.index',$data);
    }

    public function userParymentBkash($orderid){
        $data['page_title'] = "bkash payment";
        $data['orderId'] = $orderid;
        $data['bkashData'] = bkash::all();
        return view('frontend.payment.form.bkash', $data);
    }
    public function userParymentBkashSucess(Request $request){

        $orderId = $request->order_id;
        Order::find($orderId)->update([
            'payment_method'=>"bkash",
            'transaction_id'=> $request->transtionId,
        ]);

        $order_id = Order::where('id', $orderId)->first();
        transactions::insert([

            'order_id' => $order_id->id,
            'credit' => $order_id->total_amount,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('order-pdf', $orderId);

    }
    public function userParymentNagad($orderid){
        $data['page_title'] = "nagad payment";
        $data['orderId'] = $orderid;
        $data['nagadData'] = nagad::find(1);
        return view('frontend.payment.form.nagad', $data);
    }
    public function userParymentNagadSucess(Request $request){

        $orderId = $request->order_id;
        Order::find($orderId)->update([
            'payment_method'=>"nagad",
            'transaction_id'=> $request->transtionId,
        ]);

        $order_id = Order::where('id', $orderId)->first();
        transactions::insert([

            'order_id' => $order_id->id,
            'credit' => $order_id->total_amount,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('order-pdf', $orderId);

    }
    public function userParymentBank($orderid){
        $data['page_title'] = "nagad payment";
        $data['orderId'] = $orderid;
        $data['bankData'] = bank::find(1);
        return view('frontend.payment.form.bank', $data);
    }
    public function userParymentBankSucess(Request $request){

        $orderId = $request->order_id;
        // $imageName = time() . '.' . $request->slip_image->extension();
        // $request->slip_image->move(public_path('upload/payment/bank'), $imageName);
        Order::find($orderId)->update([
            'payment_method'=>"Cash",
            'transaction_id'=> $request->transtionId,
            // 'slip_image'=> $imageName,
        ]);
        $order_id = Order::where('id', $orderId)->first();
        transactions::insert([

            'order_id' => $order_id->id,
            'credit' => $order_id->total_amount,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('order-pdf', $orderId);

    }

    public function orderPdf($orderId)
    {
        $invoice = Order::where('id',$orderId)->latest()->first();
        $data = [
            'invoice' => $invoice,
        ];
        $pdf = PDF::loadView('admin.dashboard.invoice-pdf', $data);
        return $pdf->stream("$invoice->order_id.pdf");
    }

    public function OrderStatusUpdate($id, Request $request)
    {
        // Retrieve the status from the request
        $status = $request->input('status');

        // Update the order status
        $order = Order::find($id);
        if ($order) {
            $order->update([
                'status' => $status,
            ]);

            return response()->json(['message' => 'Order status updated successfully'], 200);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }


    public function adminPaymentOrderList(){


        $data['page_title'] = "Order payment List";

        $data['orders']     = $this->orderService->getAllOrders();
        return view('admin.dashboard.admin-payment-order-list', $data);

    }

    public function OrderStatusPaymentUpdate($id, Request $request)
    {
        // Retrieve the status from the request
        $status = $request->input('status');

        // Update the order status
        $order = Order::find($id);
        if ($order) {
            $order->update([
                'payment_status' => $status,
            ]);

            return response()->json(['message' => 'Order status updated successfully'], 200);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }


}