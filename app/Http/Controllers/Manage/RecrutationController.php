<?php

namespace App\Http\Controllers\Manage;

use App\Recruitment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class RecrutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request=new Request;
        if($request){
//            dd(123);
        }
//        $recruitments=Recruitment::get();
//        return response()->json(['success' => true, 'recruitments' => $recruitments], 200);
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Recruitment $recruitments)
    {
        dd($request->all());
        try {

            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'offered_position' => 'required',
                'description' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }


            $recruitments->fill($request->all());
            $recruitments->save();

            return response()->json(['success' => true], 200);
        } catch (\Throwable $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recruitments=Recruitment::whereUserId($id)->get();
        return response()->json(['success' => true, 'recruitments' => $recruitments], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllRecrutation(){
        $recruitments=Recruitment::all();
        return response()->json(['success' => true, 'recruitments' => $recruitments], 200);
    }

    public function download(){
        return view('download');
    }
}
