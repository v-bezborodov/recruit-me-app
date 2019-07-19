<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

    }

    public function update( $id, Request $request){
        $profile= User::findOrFail($id);

        $dt =Carbon::now();
        $time=($request->updated_at>0)?$dt->addMinutes($request->updated_at): $dt->subMinutes($request->updated_at);

//        User::where('id', $id)
//            ->update([
//                'first_name'=>$request->first_name,
//                'last_name'=>$request->last_name,
//                'email'=>$request->email,
//                'position_name'=>$request->position_name,
//                'company'=>$request->company,
//                'country_id'=>$request->country['id'],
//                'updated_at'=>$time,
//                'avatar'=>$request->image
//            ]);
//        debug($profile);
    if($profile){
        $file = './img/profiles/'.$profile->id.'/'.$profile->first_name.'.jpg';
        file_put_contents($file, $request->image);
    }
        $data = request()->only([
            'first_name',
        ]);

        $data['avatar']=$file;

        debug($data);
        $profile->fill($data)->save();


        return response()->json(['success'=>true,'result'=>$request->country['id']],200);
    }
}
