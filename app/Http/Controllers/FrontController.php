<?php

namespace App\Http\Controllers;

use App\Recruitment;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $recruitments=Recruitment::get();

        return view('index',  compact('recruitments'));
    }
}
