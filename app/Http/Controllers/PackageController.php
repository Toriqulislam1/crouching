<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Services\PackageService;

class PackageController extends Controller
{
    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->middleware(['auth','Setting','isAdmin']);
        $this->packageService = $packageService;

    }
    public function index ()
    {
        $data['page_title'] = "Course List";
        $data['packages'] = $this->packageService->getAllPackages(); //  get package from service
        return view('admin.package.index',$data);
    }
    public function create()
    {
        $data['page_title'] = "Add New Course";
        return view('admin.package.create',$data);
    }

    public function store(PackageRequest $request)
    {
        $in = $request->all();
        $in['user_id'] = auth()->id();
        $this->packageService->storePackage($in);// store this package using services
        session()->flash('success','Successfully Created');
        return redirect()->route('package.index');
    }
    public function show($id)
    {
        $data['page_title'] = "Course Details";
        $data['package'] = $this->packageService->editPackage($id);
        return view('admin.package.show',$data);
    }
    public function edit($id)
    {
        $data['page_title'] = "Course Edit";
        $data['package'] = $this->packageService->editPackage($id);
        return view('admin.package.edit',$data);
    }                                                    
    public function update(PackageRequest $request, $id)
    {
        $in = $request->all();
        $in['user_id'] = auth()->id();
        $this->packageService->updatePackage($id,$in);// store this package using services
        session()->flash('success','Successfully Created');
        return redirect()->route('package.index');
    }
}