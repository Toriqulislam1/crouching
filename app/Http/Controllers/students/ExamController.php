<?php

namespace App\Http\Controllers\students;

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
use App\Models\Order;

class ExamController extends Controller
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
        $user_id = auth::user()->id;
        $data['ExamList'] = Order::where('user_id',$user_id);

        return view('admin.students.ExamList.index', $data);
    }

    public function create(Request $request)
    {
        $data['page_title'] = "AssignExam Create";
        $data['Course'] = $this->AssignExamService->GetAllCourse();
        $data['Subject'] = $this->AssignExamService->GetAllSubjet();
        $data['Batch'] = $this->AssignExamService->GetAllBatch();
        return view('admin.AssignExam.create', $data);
    }

    public function store(AssignExamRequest $request)
    {
        $this->AssignExamService->AssignExamStore($request);
        return response()->json('AssignExam added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "AssignExam Edit";

        $data['AssignExam'] = $this->AssignExamService->editAssignExam($id);
        $data['Course'] = $this->AssignExamService->GetAllCourse();
        $data['Subject'] = $this->AssignExamService->GetAllSubjet();
        $data['Batch'] = $this->AssignExamService->GetAllBatch();

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
