<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\PackageService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\expense_catagory;
use Carbon\Carbon;
use App\Models\Subject;
use App\Http\Requests\SubjectRequest;


class SubjectController extends Controller
{
    protected $packageService;
    protected $orderService;
    protected $SubjectService;

    public function __construct(PackageService $packageService, OrderService $orderService,SubjectService $SubjectService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->packageService = $packageService;
        $this->orderService = $orderService;
        $this->SubjectService = $SubjectService;
    }



    public function Index(){
        $data['page_title'] = "Subject List";
        $data['subjects'] = Subject::all();

        return view('admin.subject.index',$data);
    }

    public function create(Request $request){
        $data['page_title'] = "Subject Create";
        return view('admin.subject.create', $data);
    }

    public function store(Request $request){

        $request->validate([
            'subject_name' => 'required|string|max:255',
        ]);

        // Save the subject
        Subject::create([
            'subject_name' => $request->subject_name,
        ]);

     return response()->json('subject added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "Subject Edit";
        $data['subject'] = $this->SubjectService->editSubject($id);
        return view('admin.subject.edit', $data);
    }
    public function update(SubjectRequest $request)
    {
        return response()->json('subject added successfull');
        $in = $request->all();
        $this->SubjectService->updateSubject($id, $in); // store this package using services
        session()->flash('success', 'Successfully Created');
        return response()->json('subject added successfull');
    }
    public function destroy($id)
    {
        $subject = Subject::find($id);
        if ($subject) {
            $subject->delete();
            return redirect()->back()
                ->with('success', 'Delete successfully');
        } else {
            return redirect()->back()->with('success', 'Some thing worng');
        }
    }

}