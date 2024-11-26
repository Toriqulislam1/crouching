<?php

namespace App\Http\Controllers;

use App\Services\BatchService;
use App\Services\moduleMcqService;

use Illuminate\Http\Request;
use App\Models\moduleMcq;
use App\Http\Requests\moduleMcqRequest;



class moduleMcqController extends Controller
{
    protected $moduleMcqService;
    protected $BatchService;

    public function __construct(moduleMcqService $moduleMcqService, BatchService $BatchService)
    {
        $this->middleware(['auth', 'Setting']);
        $this->moduleMcqService = $moduleMcqService;
        $this->BatchService = $BatchService;
    }



    public function Index()
    {
        $data['page_title'] = "Module MCQ";
        $data['moduleMcq'] =$this->moduleMcqService->getAllcoduleMcq();
        return view('admin.moduleMcq.index', $data);
    }

    public function create(Request $request)
    {

        $data['page_title'] = "module Mcq Create";
        return view('admin.moduleMcq.create', $data);
    }

    public function store(moduleMcqRequest $request)
    {
        $this->moduleMcqService->moduleMcqStore($request);
        return response()->json('moduleMcq added successfull');
    }
    public function edit($id)
    {
        $data['page_title'] = "moduleMcq Edit";
        $data['moduleMcq'] = $this->moduleMcqService->editmoduleMcq($id);
        return view('admin.moduleMcq.edit', $data);
    }
    public function update(moduleMcqRequest $request)
    {
        $id = $request->Id;

        $this->moduleMcqService->updatemoduleMcq($id, $request); // store this package using services
        session()->flash('success', 'Successfully Created');
        return response()->json('Update successfull');
    }
    public function destroy($id)
    {
        $moduleMcq = moduleMcq::find($id);
        if ($moduleMcq) {
            $moduleMcq->delete();
            return redirect()->back()
                ->with('success', 'Delete successfully');
        } else {
            return redirect()->back()->with('success', 'Some thing worng');
        }
    }
}
