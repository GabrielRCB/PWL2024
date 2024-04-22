<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $name = "Gabriel";
        return view('test',[
            'nama' => $name
        ]);


    }
    public function read($judul)
    {
//        $headers = explode('-',$judul);
//        $header = ucwords(implode(' ',$headers));
        echo $judul;
    }
    public function teacher()
    {
       $teachers = Teacher::with('students')->get();
       return view('teacher', ['teachers' => $teachers]);
    }
    public  function student()
    {
        $students = Student::query()
            ->with('teacher')
            ->paginate(10);
        return view('student',['students'=>$students]);

    }

}
