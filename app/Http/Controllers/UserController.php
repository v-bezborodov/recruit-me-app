<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update( Request $request){
        $profile= User::findOrFail($request->id);

        User::where('id', $request->id)
            ->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'position_name'=>$request->position_name,
                'company'=>$request->company,
                'country_id'=>$request->country['id'],
            ]);
        return response()->json(['success'=>true,'result'=>$request->country['id']],200);
    }
}
