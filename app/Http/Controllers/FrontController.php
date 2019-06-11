<?php

namespace App\Http\Controllers;

use App\Recruitment;
//use Datatables;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $recruitments=Recruitment::get();
        $actions=view('layouts.actions._actions');


//        DataTables::eloquent('App\Recruitment')->addColumn('action', 'layouts.actions._actions');

//        return DataTables::eloquent($model)
//            ->addColumn('intro', 'Hi {{$name}}!')
//            ->toJson()
        $test='testdata';
        return view('index',  compact('recruitments','actions','test'));
    }
}
