<?php

namespace App\Http\Controllers;

use App\Services\ExamService;
use App\Services\PackageService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Batch;
use Carbon\Carbon;
use App\Models\Order;
use App\Http\Requests\SubjectRequest;
use App\Models\Mcq;
use App\Models\Assignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\OrderService;
class assignmentController extends Controller
{
    protected $packageService;
    protected $ExamService;
    protected $SubjectService;
    protected $orderService;

    public function __construct(PackageService $packageService, ExamService $ExamService,SubjectService $SubjectService, OrderService $orderService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->packageService = $packageService;
        $this->ExamService = $ExamService;
        $this->SubjectService = $SubjectService;
        $this->orderService = $orderService;
    }
    public function index()
    {
        $data['page_title'] = "Assignment List";
        $data['assignments']= Assignment::with(['subject', 'batch'])->get();
        return view('admin.assignments.index',$data);
    }

    public function create()
    {
        $data['page_title'] = "Create assignment";
        $data['subjects'] = Subject::all();
        $data['batches'] = Batch::all();
        return view('admin.assignments.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'subject_id' => 'required|exists:subjects,id',
            'batch_id' => 'required|exists:batches,id',
          
        ]);

        Assignment::create($request->all());

        return redirect()->route('admin.assignment.index')->with('success', 'Assignment created successfully!');
    }

    public function destroy($id)
    {
        $Course = Assignment::find($id);
        if ($Course) {
            $Course->delete();
            return redirect()->back()
                ->with('success', 'Delete successfully');
        } else {
            return redirect()->back()->with('success', 'Some thing worng');
        }
    }
}