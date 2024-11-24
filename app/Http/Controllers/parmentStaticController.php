<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\bank;
use App\Services\PackageService;
use Illuminate\Http\Request;
use App\Models\bkash;
use App\Models\nagad;
use Image;


class parmentStaticController extends Controller
{

    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->middleware(['auth', 'Setting', 'isAdmin']);
        $this->packageService = $packageService;
    }

    public function index()
    {

        $data['page_title'] = "Bkash";

        $data['allData'] = Bkash::all();
        return view('admin.payment.bkash.index', $data);
    }
    public function createBkash()
    {

        $data['page_title'] = "Bkash";


        return view('admin.payment.bkash.create', $data);
    }
    public function bkashStore(Request $request)
    {
        $imageName = time() . '.' . $request->bkash_image->extension();
        $request->bkash_image->move(public_path('upload/payment'), $imageName);
        bkash::insert([
            'payment_name' => $request->payment_name,
            'transaction_id' => $request->transaction_id,
            'note' => $request->note,
            'bkash_image' =>  $imageName
        ]);
        session()->flash('success', 'Successfully Created');
        return redirect()->back();
    }
    public function bkashEdit($id)
    {
        $data['page_title'] = "Bkash Edit";
        $data['editData'] = bkash::find($id);

        return view('admin.payment.bkash.edit', $data);
    }
    public function bkashUpdate(Request $request)
    {
        $id = $request->id;
        $imageName = time() . '.' . $request->bkash_image->extension();
        $request->bkash_image->move(public_path('upload/payment'), $imageName);
        bkash::find($id)->update([
            'payment_name' => $request->payment_name,
            'transaction_id' => $request->transaction_id,
            'note' => $request->note,
            'bkash_image' =>  $imageName
        ]);
        session()->flash('success', 'Successfully Update');
        return redirect()->back();
    }
    public function bkashDelete($id)
    {
        bkash::find($id)->delete();
        return redirect()->back();
    }
    public function nagadIndex()
    {

        $data['page_title'] = "Nagad";

        $data['editData'] = nagad::find(1);
        return view('admin.payment.nagad.create', $data);
    }
    public function nagadUpdate(Request $request){
        $imageName = time() . '.' . $request->nagad_image->extension();
        $request->nagad_image->move(public_path('upload/payment'), $imageName);
        nagad::find(1)->update([
            'payment_name' => $request->payment_name,
            'transaction_id' => $request->transaction_id,
            'note' => $request->note,
            'nagad_image' =>  $imageName
        ]);
        session()->flash('success', 'Successfully Update');
        return redirect()->back();
    }
    public function bankIndex()
    {

        $data['page_title'] = "Bank";
        $data['editData'] = bank::find(1);

        return view('admin.payment.bank.create', $data);
    }
    public function bankUpdate(Request $request){
        $imageName = time() . '.' . $request->bank_image->extension();
        $request->bank_image->move(public_path('upload/payment'), $imageName);
        bank::find(1)->update([
            'payment_name' => $request->payment_name,
            'note' => $request->note,
            'bank_image' =>  $imageName
        ]);
        session()->flash('success', 'Successfully Update');
        return redirect()->back();
    }
}