<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\PackageService;
use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\expense_catagory;
use Carbon\Carbon;
class FinancialStatementsController extends Controller
{
    protected $packageService;
    protected $orderService;

    public function __construct(PackageService $packageService, OrderService $orderService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->packageService = $packageService;
        $this->orderService = $orderService;
    }



    public function withdrawIndex(){

        $data['total_balance']= transactions::sum('credit') - transactions::sum('debit');

        $data['page_title'] = "withdraw";

        return view('admin.financial.withdraw.index', $data);
    }

    public function withdrawStore(Request $request){

        $validatedData = $request->validate([
            'withdraw_amount' => 'required|numeric',
        ]);

        transactions::insert([
            'debit' => $request->withdraw_amount,
            'type' => "withdraw",
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','withdraw successfull');
    }

    public function expenseCategory(){
        $data['page_title'] = "expense category";


       return view('admin.financial.expense.expense_catagory', $data);
    }
    public function expenseCategoryStore(Request $request){

        $validatedData = $request->validate([
            'expense_cat' => 'required',
        ]);
        expense_catagory::insert([
            'name' => $request->expense_cat,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'expense category successfull');
    }

    public function expenseIndex(){
        $data['page_title'] = "expense";
        $data['category'] = expense_catagory::all();
       return view('admin.financial.expense.index', $data);
    }

    public function expenseStore(Request $request)
    {
        $validatedData = $request->validate([
            'expense_cat' => 'required',
            'amount' => 'required',
        ]);
        transactions::insert([
            'debit' => $request->amount,
            'category_id' => $request->expense_cat,
            'type' => "expense",
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'Expense added successfull');
    }


    public function expenseCategoryList(){

        $data['page_title'] = "expense";
        $data['category'] = expense_catagory::all();
        return view('admin.financial.expense.expense_cat_list', $data);
    }

    public function expenseCategoryEdit($id){

        $data['page_title'] = "Expense Catagory Edit";
        $data['category'] = expense_catagory::find($id);
        return view('admin.financial.expense.expense_cat_edit', $data);
    }




}