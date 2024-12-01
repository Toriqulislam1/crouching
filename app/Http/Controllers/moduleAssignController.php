<?php

namespace App\Http\Controllers;

use App\Services\BatchService;
use App\Services\AssignModuleService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\AssignExam;
use App\Models\AssignModule;
use Carbon\Carbon;
use App\Http\Requests\AssignModuleRequest;
;
use App\Http\Requests\SubjectRequest;
use App\Http\Requests\BatchRequest;
use App\Models\moduleMcq;

class moduleAssignController extends Controller
{
    protected $AssignModuleService;
    protected $orderService;
    protected $BatchService;

    public function __construct(AssignModuleService $AssignModuleService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->AssignModuleService = $AssignModuleService;

    }



    public function Index()
    {
        $data['page_title'] = "Assign Module List";
        $data['assignModules'] = $this->AssignModuleService->GetAllAssignModule();

        return view('admin.AssignModule.index', $data);
    }

    public function create(Request $request)
    {
        $data['page_title'] = "Module Assign Create";
        $data['modules'] = moduleMcq::all();
        $data['AssignExam'] = AssignExam::all();


        return view('admin.AssignModule.create', $data);
    }

    public function store(AssignModuleRequest $request)
    {
        $this->AssignModuleService->AssignModuleStore($request);
        return response()->json('Assign Module added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "Assign Module Edit";

        $data['AssignExam'] = $this->AssignExamService->editAssignExam($id);
        $data['Course'] = $this->AssignExamService->GetAllCourse();
        $data['Subject'] = $this->AssignExamService->GetAllSubjet();
        $data['Batch'] = $this->AssignExamService->GetAllBatch();

        return view('admin.AssignModule.edit', $data);
    }
    public function Update(AssignModuleRequest $request)
    {
        $id = $request->Id;

        $this->AssignExamService->updateAssignExam($id,$request); // store this package using services
        session()->flash('success', 'Successfully Created');
        return response()->json('Update successfull');
    }
    public function destroy($id)
    {
        $AssignExam = AssignModule::find($id);
        if ($AssignExam) {
            $AssignExam->delete();
            return redirect()->back()
                ->with('success', 'Delete successfully');
        } else {
            return redirect()->back()->with('success', 'Some thing worng');
        }

   }
}
