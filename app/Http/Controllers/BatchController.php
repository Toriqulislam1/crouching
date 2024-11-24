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
        $data['batchs'] = Batch::all();

        return view('admin.batch.index',$data);
    }

    public function create(Request $request){
        $data['page_title'] = "Batch Create";
        return view('admin.batch.create', $data);
    }

    public function store(BatchRequest $request){
        // Save the subject
        Batch::create([
            'batch_name' => $request->batchName,
        ]);

     return response()->json('subject added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "Batch Edit";
        $data['batch'] = $this->BatchService->editBatch($id);
        return view('admin.batch.edit', $data);
    }
    public function update(BatchRequest $request)
    {
        $id = $request->id;
        $in = $request->all();
        $this->BatchService->updateBatch($id, $in); // store this package using services
        session()->flash('success', 'Successfully Created');
        return response()->json('Update successfull');
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