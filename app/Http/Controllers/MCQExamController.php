<?php

namespace App\Http\Controllers;

use App\Services\BatchService;
use App\Services\McqService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\Mcq;
use App\Models\mcq_options;
use Carbon\Carbon;
use App\Http\Requests\McqRequest;
use App\Http\Requests\SubjectRequest;
use App\Http\Requests\BatchRequest;


class MCQExamController extends Controller
{
    protected $McqService;
    protected $orderService;
    protected $BatchService;

    public function __construct(McqService $McqService, BatchService $BatchService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->McqService = $McqService;
        $this->BatchService = $BatchService;
    }



    public function Index()
    {
        $data['page_title'] = "Assign Exam List";
        $data['Mcq'] = Mcq::with('options')->get();
        return view('admin.Mcq.index', $data);
    }

    public function create(Request $request)
    {
        $data['page_title'] = "Mcq Create";
        $data['module'] = $this->McqService->GetAllModule();

        return view('admin.Mcq.create', $data);
    }


    public function store(McqRequest $request)
    {
        $this->McqService->McqStore($request);
        return response()->json('Mcq added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "Mcq Edit";
        $data['module'] = $this->McqService->GetAllModule();
        $data['Mcq'] = $this->McqService->editMcq($id);

        return view('admin.Mcq.edit', $data);
    }
    public function Update(McqRequest $request)
    {
        $id = $request->id;
       

        $this->McqService->updateMcq($id, $request); // store this package using services
        session()->flash('success', 'Successfully Created');
        return response()->json('Update successfull');
    }
    public function destroy($id)
    {
        $Mcq = Mcq::find($id);
        if ($Mcq) {
            $Mcq->delete();
            return redirect()->back()
                ->with('success', 'Delete successfully');
        } else {
            return redirect()->back()->with('success', 'Some thing worng');
        }
    }
}