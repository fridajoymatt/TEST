<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('backOffice.dashbord');
    }

}
