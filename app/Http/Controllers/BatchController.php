<?php

namespace App\Http\Controllers;

use App\Services\BatchService;
use App\Services\PackageService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\expense_catagory;
use Carbon\Carbon;

use App\Http\Requests\SubjectRequest;
use App\Http\Requests\BatchRequest;
use Illuminate\Bus\Batch as BusBatch;

class BatchController extends Controller
{
    protected $packageService;
    protected $orderService;
    protected $BatchService;

    public function __construct(PackageService $packageService,BatchService $BatchService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->packageService = $packageService;
        $this->BatchService = $BatchService;
    }



    public function Index(){
        $data['page_title'] = "Batch List";
        $data['subjects'] = Batch::all();

        return view('admin.batch.index',$data);
    }

    public function create(Request $request){
        $data['page_title'] = "Subject Create";
        return view('admin.batch.create', $data);
    }

    public function store(Request $request){

        $request->validate([
            'batch_name' => 'required|string|max:255',
        ]);

        // Save the subject
        Batch::create([
            'batch_name' => $request->batch_name,
        ]);

     return response()->json('subject added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "Batch Edit";
        $data['subject'] = $this->BatchService->editBatch($id);
        return view('admin.subject.edit', $data);
    }
    public function update(BatchRequest $request)
    {
        return response()->json('Batch added successfull');
        $in = $request->all();
        $this->BatchService->updateBatch($id, $in); // store this package using services
        session()->flash('success', 'Successfully Created');
        return response()->json('subject added successfull');
    }
    public function destroy($id)
    {
        $subject = Batch::find($id);
        if ($subject) {
            $subject->delete();
            return redirect()->back()
                ->with('success', 'Delete successfully');
        } else {
            return redirect()->back()->with('success', 'Some thing worng');
        }
    }

}
