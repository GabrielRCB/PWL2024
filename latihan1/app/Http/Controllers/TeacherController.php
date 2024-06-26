<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function list()
    {
       $teachers = Teacher::query()->paginate(10) ;
       return view('content.teacher.list',[
           'teachers' => $teachers
       ]);
    }

    public function add(){
        return view('content.teacher.add');

    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date|before:' . Carbon::now()->addDay()->format('Y-m-d') . '',
        ]);
        #sudah tervalidasi
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->save();
        return redirect(url('/teacher'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date|before:' . Carbon::now()->addDay()->format('Y-m-d') . '',
        ]);
        $teacher = Teacher::find($request->id);
        if ($teacher === null) {
            abort(404);
        }
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->save();
        return redirect(url('/teacher'));
    }

    public function edit(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if ($teacher === null) {
            abort(404);
        }
        return view('content.teacher.edit', [
            'teacher' => $teacher
        ]);
    }

    public function delete(Request $request)
    {
        $idTeacher = $request->id;
        $teacher = Teacher::find($idTeacher);
        if ($teacher === null) {
            return response()->json([], 404);
        }
        $teacher->delete();
        return response()->json([], 200);
    }

}
