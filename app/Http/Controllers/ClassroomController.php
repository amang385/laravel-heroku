<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Teaching;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('portal/classroom', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $teachings = Teaching::where([
        //     'classrooms_id' => $id
        // ])->get();

        // $classroom = Classroom::find($id);

        return view('portal/classroom-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classroom = new Classroom();
        $classroom->classrooms_name = $request->classrooms_name;
        $classroom->save();
        return redirect()->route('classroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom, $id = null)
    {
        $teachings = Teaching::where([
            'classrooms_id' => $id
        ])->get();

        $classroom = Classroom::find($id);

        // dd($teachings);
        return view('portal/teaching', compact('teachings', 'id', 'classroom'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom, $id)
    {
        Classroom::destroy($id);
        return redirect()->route('classroom');
        
    }
}
