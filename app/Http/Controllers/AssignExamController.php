<?php

namespace App\Http\Controllers;

use App\Services\BatchService;
use App\Services\AssignExamService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\AssignExam;
use App\Models\expense_catagory;
use Carbon\Carbon;
use App\Http\Requests\AssignExamRequest;
use App\Http\Requests\SubjectRequest;
use App\Http\Requests\BatchRequest;


class AssignExamController extends Controller
{
    protected $AssignExamService;
    protected $orderService;
    protected $BatchService;

    public function __construct(AssignExamService $AssignExamService, BatchService $BatchService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->AssignExamService = $AssignExamService;
        $this->BatchService = $BatchService;
    }



    public function Index()
    {
        $data['page_title'] = "Assign Exam List";
        $data['AssignExam'] = AssignExam::all();

        return view('admin.AssignExam.index', $data);
    }

    public function create(Request $request)
    {
        $data['page_title'] = "AssignExam Create";
        return view('admin.AssignExam.create', $data);
    }

    public function store(AssignExamRequest $request)
    {
        // Save the subject
        AssignExam::create([
            'AssignExam_name' => $request->AssignExam_name,
        ]);

        return response()->json('AssignExam added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "AssignExam Edit";
        $data['AssignExam'] = $this->AssignExamService->editAssignExam($id);
        return view('admin.AssignExam.edit', $data);
    }
    public function update(AssignExamRequest $request)
    {
        $id = $request->id;
        $in = $request->all();
        $this->AssignExamService->updateAssignExam($id, $in); // store this package using services
        session()->flash('success', 'Successfully Created');
        return response()->json('Update successfull');
    }
    public function destroy($id)
    {
        $AssignExam = AssignExam::find($id);
        if ($AssignExam) {
            $AssignExam->delete();
            return redirect()->back()
                ->with('success', 'Delete successfully');
        } else {
            return redirect()->back()->with('success', 'Some thing worng');
        }
    }
}