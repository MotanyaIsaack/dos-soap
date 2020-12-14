<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all()->where('suspended', 'false');
        $courses = Course::all()->where('suspended', 'false');
        return view('students.create', ['students' => $students, 'courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Student::with('course')->get());
        $students = Student::with('course')->where('suspended', 'false')->get();
        $courses = Course::all()->where('suspended', 'false');
        return view('students.create', ['students' => $students, 'courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students',
            'full_name' => 'required',
            'email' => 'required|unique:students',
            'phone' => 'required|unique:students',
            'address' => 'required',
            'entry_points' => 'required',
            'course_id' => 'required',
        ]);

        $student = new Student([
            'student_id' => $request->get('student_id'),
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'entry_points' => $request->get('entry_points'),
            'course_id' => $request->get('course_id'),
        ]);

        $student->save();

        return redirect('/students/create')->with('success', $request->get('full_name') . ' registered successfully');
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
        $student = Student::find($id);
        $student->suspended = true;
        $student->save();
        return redirect('/students/create')->with('success', $student->full_name . ' deleted successfully');
    }
}
