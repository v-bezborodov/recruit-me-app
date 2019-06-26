<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update( Request $request){
        $profile= User::findOrFail($request->id);
        $dt =Carbon::now();
//        $dt = Carbon\Carbon::now();
        $time=$request->updated_at>0() $dt->addMinutes($request->updated_at)? $dt->subMinutes($request->updated_at);
//        $dt->addMinutes($request->updated_at);
dd($dt->toDateTimeString());

        User::where('id', $request->id)
            ->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'position_name'=>$request->position_name,
                'company'=>$request->company,
                'country_id'=>$request->country['id'],
                'updated_at'=>$time
            ]);
        return response()->json(['success'=>true,'result'=>$request->country['id']],200);
    }
}
