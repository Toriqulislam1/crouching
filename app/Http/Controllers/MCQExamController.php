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
        $data['Mcq'] = Mcq::all();

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
dd("asdf");
        // $request->validate([
        //     'batch' => 'required|array|min:1',
        //     'batch.*' => 'exists:modules,id', // Validate that the selected modules exist
        //     'question' => 'required|string',
        //     'options' => 'required|array|min:2', // At least two options
        //     'correct_answer' => 'required|string|in:' . implode(',', $request->options), // Must be one of the options
        // ]);

        // Save the MCQ
        $mcq = Mcq::create([
            'module_id' => $request->batch[0],
            'question' => $request->question,
        ]);

        // Save the options
        foreach ($request->options as $key => $option) {
            mcq_options::create([
                'mcq_id' => $mcq->id,
                'option_text' => $option,
                'is_correct' => $option === $request->correct_answer,
            ]);
        }

        // $this->McqService->McqStore($request);
        return response()->json('Mcq added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "Mcq Edit";

        $data['Mcq'] = $this->McqService->editMcq($id);
        $data['Course'] = $this->McqService->GetAllCourse();
        $data['Subject'] = $this->McqService->GetAllSubjet();
        $data['Batch'] = $this->McqService->GetAllBatch();

        return view('admin.Mcq.edit', $data);
    }
    public function Update(McqRequest $request)
    {
        $id = $request->Id;

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