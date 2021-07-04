<?php

namespace App\Http\Controllers;

use App\Teaching;
use Illuminate\Http\Request;

class TeachingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('portal/teaching-create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('teachings_image');
        $contents = $file->openFile()->fread($file->getSize());
        // dd($file);
        // if ($file != "") {
        //     $contents = $file->openFile()->fread($file->getSize());
        // }

        $datetime = explode("/", $request->teachings_datetime);
        $year_time = explode(" ", $datetime[2] );
        $year = $year_time[0];
        $time = $year_time[1];
        
        $teaching = new Teaching();
        $teaching->teachings_datetime = date('Y-m-d H:i:s' , strtotime($year."-".$datetime[1]."-".$datetime[0]." ".$time));
        $teaching->teachings_class = $request->teachings_class;
        $teaching->teachings_subject = $request->teachings_subject;
        $teaching->teachings_signature = $request->teachings_signature;
        $teaching->teachings_note = $request->teachings_note;
        $teaching->classrooms_id = $request->classrooms_id;
        $teaching->teachings_image = $contents;
        $teaching->save();
        return redirect()->route('teaching', ['id'=> $request->classrooms_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function show(Teaching $teaching)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function edit(Teaching $teaching)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teaching $teaching)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teaching $teaching)
    {
        //
    }
}
