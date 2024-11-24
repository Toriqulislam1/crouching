<?php

namespace App\Http\Controllers;

use App\Services\PackageService;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->middleware(['Setting']);
        $this->packageService = $packageService;

    }

    public function home()
    {
        $data['page_title'] = "Home";
        $data['packages'] = $this->packageService->getAllPackages();
        return view('frontend.home',$data);
    }
}
