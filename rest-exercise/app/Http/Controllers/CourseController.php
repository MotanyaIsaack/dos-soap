<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all()->where('suspended', false);
        return view('courses.create', compact('courses'));
    }


    public function create()
    {
        $courses = Course::all()->where('suspended', false);
        return view('courses.create', compact('courses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses'
        ]);

        $course = new Course([
            'name' => $request->get('name')
        ]);
        $course->save();
        return redirect('/courses/create')->with('success', 'Course saved!');
        // return response()->json(['ok'=>true,'msg'=>'Course inserted successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $course = Course::find($id);
        $course->suspended = true;
        $course->save();
        return redirect('/courses/create')->with('success', $course->name . ' deleted successfully');
    }
}
