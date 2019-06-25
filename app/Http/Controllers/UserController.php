<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update( Request $request){
        $profile= User::findOrFail($request->id);
//dd($request->all());exit;
        User::where('id', $request->id)
            ->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'position_name'=>$request->position_name,
                'company'=>$request->company,
                'country_id'=>$request->country['id'],
                'updated_at'=>$request->updated_at
            ]);
        return response()->json(['success'=>true,'result'=>$request->country['id']],200);
    }
}
