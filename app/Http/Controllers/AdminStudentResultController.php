<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Services\BatchService;
use App\Services\AssignExamService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\AssignExam;
use App\Models\Mcq;
use Carbon\Carbon;
use App\Http\Requests\AssignExamRequest;
use App\Http\Requests\SubjectRequest;
use App\Http\Requests\BatchRequest;


class AdminStudentResultController extends Controller
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

        return view('admin.result.admin.index', $data);
    }

    public function create(Request $request)
    {
        $data['page_title'] = "Exam Create";
        $data['Course'] = $this->AssignExamService->GetAllCourse();
        $data['Subject'] = $this->AssignExamService->GetAllSubjet();
        $data['Batch'] = $this->AssignExamService->GetAllBatch();
        $data['Mcq'] = Mcq::with('options')->paginate(50);

        return view('admin.AssignExam.create', $data);
    }

    public function store(AssignExamRequest $request)
    {
        $this->AssignExamService->AssignExamStore($request);
        return response()->json('AssignExam added successfull');
    }
    public function edit($AssignExamId)
    {

        $assignDetails =  AssignExam::findOrFail($AssignExamId);


        $questionIds = json_decode($assignDetails->question, true);

        $data['IdsForAfterSelected'] = json_decode($assignDetails->question, true);

        // Query the `mcqs` table for the corresponding questions
        $data['questions'] = DB::table('mcqs')->whereIn('id', $questionIds)->get();


        $data['page_title'] = "Exam UPdate";
        $data['Course'] = $this->AssignExamService->GetAllCourse();
        $data['Subject'] = $this->AssignExamService->GetAllSubjet();
        $data['Batch'] = $this->AssignExamService->GetAllBatch();
        $data['Mcq'] = Mcq::with('options')->paginate(50);
        $data['page_title'] = "Exam Edit";
        $data['AssignExam'] = $this->AssignExamService->editAssignExam($AssignExamId);

        return view('admin.AssignExam.edit', $data);
    }
    public function Update(AssignExamRequest $request)
    {
        $id = $request->Id;

        $this->AssignExamService->updateAssignExam($id,$request); // store this package using services
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
