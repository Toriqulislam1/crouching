<?php

namespace App\Http\Controllers;

use App\Services\ExamService;
use App\Services\PackageService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\expense_catagory;
use Carbon\Carbon;
use App\Models\Subject;
use App\Http\Requests\SubjectRequest;


class ExamController extends Controller
{
    protected $packageService;
    protected $ExamService;
    protected $SubjectService;

    public function __construct(PackageService $packageService, ExamService $ExamService,SubjectService $SubjectService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->packageService = $packageService;
        $this->ExamService = $ExamService;
        $this->SubjectService = $SubjectService;
    }
    public function Index(){
        $data['page_title'] = "Exam List";
        $data['subjects'] = Exam::all();

        return view('admin.exam.index',$data);
    }

    public function create(Request $request){
        $data['page_title'] = "Exam Create";
        return view('admin.exam.create', $data);
    }

    public function store(Request $request){

        $request->validate([
            'subject_name' => 'required|string|max:255',
        ]);

        // Save the subject
        Exam::create([
            'subject_name' => $request->subject_name,
        ]);

     return response()->json('Exam added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "Subject Edit";
        $data['subject'] = $this->ExamService->editExam($id);
        return view('admin.subject.edit', $data);
    }
    public function update(SubjectRequest $request)
    {
        return response()->json('Exam added successfull');
        $in = $request->all();
        $this->SubjectService->updateExam($id, $in); // store this package using services
        session()->flash('success', 'Successfully Created');
        return response()->json('subject added successfull');
    }
    public function destroy($id)
    {
        $subject = Exam::find($id);
        if ($subject) {
            $subject->delete();
            return redirect()->back()
                ->with('success', 'Delete successfully');
        } else {
            return redirect()->back()->with('success', 'Some thing worng');
        }
    }

}