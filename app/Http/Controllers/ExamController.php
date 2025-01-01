<?php

namespace App\Http\Controllers;

use App\Services\ExamService;
use App\Services\PackageService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Models\AssignExam;
use Carbon\Carbon;
use App\Models\Order;
use App\Http\Requests\SubjectRequest;
use App\Models\Mcq;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\OrderService;

class ExamController extends Controller
{
    protected $packageService;
    protected $ExamService;
    protected $SubjectService;
    protected $orderService;

    public function __construct(PackageService $packageService, ExamService $ExamService, SubjectService $SubjectService, OrderService $orderService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->packageService = $packageService;
        $this->ExamService = $ExamService;
        $this->SubjectService = $SubjectService;
        $this->orderService = $orderService;
    }
    public function Index()
    {
        $data['page_title'] = "Exam List";
        $user_id = auth::user()->id;
        $data['ExamList'] = $this->orderService->getUserOrders($user_id);


        return view('admin.students.ExamList.index', $data);
    }


    public function create(Request $request, $packageId)
    {

        $Package = Package::find($packageId);

        $subject_id = json_decode($Package->subject_id);
        $batch_id = json_decode($Package->batch_id);
        $exam = AssignExam::where('SubjectId', $subject_id)
            ->where('BatchId', $batch_id)
            ->get();
        $data = $exam[0]; // Assuming $exam contains the provided data

        // Decode the JSON `question` field into an array
        $questionIds = json_decode($data->question, true);
        $data['exam'] = $exam[0];
        // Query the `mcqs` table for the corresponding questions
        $data['questions'] = DB::table('mcqs')->whereIn('id', $questionIds)->get();

        // Query the `mcq_options` table for the options
        $options = DB::table('mcq_options')->whereIn('mcq_id', $questionIds)->get();

        // Group options by their `mcq_id`
        $data['groupedOptions'] = $options->groupBy('mcq_id');

        $data['page_title'] = "Exam for student";

        return view('admin.students.ExamList.create', $data);
    }

    public function store(Request $request)
    {
        $studentId = auth()->id(); // Assuming logged-in user is the student
        $examNameId = (int) $request->input('exam_name_id');

        $alreadySubmitted = StudentAnswer::where('student_id', $studentId)
            ->where('exam_name_id', $examNameId)
            ->exists();

        if ($alreadySubmitted) {
            session()->flash('error', 'You have already submitted this exam.');
            return redirect()->back(); // Redirect back with the session error
        }


        // Filter out only question-related inputs
        $answers = collect($request->except('_token', 'exam_name_id'));

        foreach ($answers as $key => $optionId) {
            // Ensure the key represents a question (e.g., "question_4")
            if (str_starts_with($key, 'question_')) {
                // Extract the actual question ID
                $questionId = (int) str_replace('question_', '', $key);

                // Save the answer
                StudentAnswer::create([
                    'student_id' => $studentId,
                    'question_id' => $questionId,
                    'option_id' => $optionId,
                    'exam_name_id' => $examNameId,
                ]);
            }
        }

        session()->flash('success', 'Exam submitted successfully.');

        return redirect()->back();
    }

    public function showIndex()
    {
        $data['page_title'] = "Exam List";
        $user_id = auth()->user()->id;

        // Fetch answers and group them by exam_name_id
        $answers = StudentAnswer::with('question', 'examName', 'option')
            ->where('student_id', $user_id)
            ->get()
            ->groupBy('exam_name_id');

        $data['examResults'] = $answers->map(function ($examAnswers) {
            $correctCount = $examAnswers->filter(function ($answer) {
                return $answer->option && $answer->option->is_correct;
            })->count();
            // Access the first answer to fetch exam details
            $firstAnswer = $examAnswers->first();
            return [
                'exam_name' => $firstAnswer->examName->name ?? 'N/A',
                'subject_name' => $firstAnswer->examName->subject->subject_name ?? 'N/A',
                'total_marks' => $correctCount,
            ];
        });

        return view('admin.students.ExamList.ShowIndex', $data);
    }



    public function showResults($studentId)
    {



        $data['page_title'] = "Exam List";
        $answers = StudentAnswer::with('question', 'option')
            ->where('student_id', $studentId)
            ->get();

        $correctAnswers = $answers->filter(function ($answer) {
            return $answer->option->is_correct;
        });

        return view('results', [
            'answers' => $answers,
            'correctCount' => $correctAnswers->count(),
            'totalCount' => $answers->count(),
        ]);
    }
}