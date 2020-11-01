<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response($students);
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
    public function store(Request $request)
    {
        $student = new Student();
        $student -> name = $request-> name;
        $student -> course = $request-> course;
        $student -> save();

        return response() -> json ([
            $student,
            "message" => "Student record created"
        ]);
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
        $student = Student::find($id);

        if($student != null)
        {
            return response($student);
        }
        else
        {
            return response() -> json([
                'message' => "student does not exists"
            ]);
        }
    
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
        $student = Student::find($id);

        if($student != null)
        {
            $student -> name = $request -> name;
            $student -> course = $request -> course;
            $student -> save();
            return response($student);
        }
        else
        {
            return response() -> json([
                'message' => "student does not exists"
            ]);
        }

        
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

        if($student != null)
        {
            $student -> delete();
            return response() -> json([
                'message' =>  "Student deleted " 
            ]);
        }
        else
        {
            return response() -> json([
                'message' => "student does not exists"
            ]);
        }
        
    }
}
