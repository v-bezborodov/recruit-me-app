<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update( Request $request){
//        $profile=User::all();
        $profile=User::findOrFail($request->id);
        return response()->json(['success'=>true,'result'=>$profile],200);
    }
}
