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

    if($profile){
        $fileName=strtolower($profile->first_name.'.jpg');
        $file = public_path().'/img/profiles/'.$profile->id.'/'.$fileName;
        $data_img = base64_decode($request->image);

        $fileBin = file_get_contents($request->image);
        $mimeType = mime_content_type($request->image);
        file_put_contents($file, $fileBin);
        debug($file);
    }

        //$request->file('image')->store('images');

        $data = request()->only([
                'first_name',
                'last_name',
                'email',
                'position_name',
                'company',
        ]);

        $data['avatar']=$fileName;
        $request->has('updated_at')??$data['updated_at']=$time;
        $request->has('country')??$data['country_id']=$request->country['id'];
//        debug($request->image);
        $profile->fill($data)->save();

        return response()->json(['success'=>true],200);
    }
}
