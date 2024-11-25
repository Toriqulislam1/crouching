<?php

namespace App\Http\Controllers;

use App\Services\BatchService;
use App\Services\CourseService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\expense_catagory;
use Carbon\Carbon;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\SubjectRequest;
use App\Http\Requests\BatchRequest;


class CourseController extends Controller
{
    protected $CourseService;
    protected $orderService;
    protected $BatchService;

    public function __construct(CourseService $CourseService,BatchService $BatchService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->CourseService = $CourseService;
        $this->BatchService = $BatchService;
    }



    public function Index(){
        $data['page_title'] = "Course List";
        $data['Course'] = Course::all();

        return view('admin.course.index',$data);
    }

    public function create(Request $request){
        $data['page_title'] = "Course Create";
        return view('admin.course.create', $data);
    }

    public function store(CourseRequest $request){
        // Save the subject
        Course::create([
            'Course_name' => $request->Course_name,
        ]);

     return response()->json('Course added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "Course Edit";
        $data['Course'] = $this->CourseService->editCourse($id);
        return view('admin.course.edit', $data);
    }
    public function update(CourseRequest $request)
    {
        $id = $request->id;
        $in = $request->all();
        $this->CourseService->updateCourse($id, $in); // store this package using services
        session()->flash('success', 'Successfully Created');
        return response()->json('Update successfull');
    }
    public function destroy($id)
    {
        $Course = Course::find($id);
        if ($Course) {
            $Course->delete();
            return redirect()->back()
                ->with('success', 'Delete successfully');
        } else {
            return redirect()->back()->with('success', 'Some thing worng');
        }
    }

}