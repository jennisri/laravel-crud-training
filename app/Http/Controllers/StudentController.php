<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index', [
            'students' => Student::all()
        ]);
    }

    // insert data
    public function store(Request $request)
    {
        // cara pertama validation
        $request->validate([
            'name' => 'required|min:3',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email'
        ]);

        Student::create($request->all());
        return back()->with('success', 'Student ' . $request->name . ' has been created');
    }

    // show detail data
    // lakukan model pada parameter, model building
    public function show(Student $student)
    {
        return view('student.show', [
            // cara satu
            // 'student' => Student::where('id', $id)->first()
            // 'student' => Student::whereId($id)->first()

            // cara dua
            'student' => $student
        ]);
    }

    // hapus
    public function destroy($id)
    {
        Student::find($id)->delete();
        return back()->with('success', 'Student has been deleted');
    }


    // update
    public function update(Student $student, Request $request)
    {
        // cara pertama validation
        $request->validate([
            'name' => 'required|min:3',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email'
        ]);
        
        Student::find($student->id)->update($request->all());
        return back()->with('success', 'Student ' . $request->name . ' has been updated');
    }


}
