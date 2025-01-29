<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    function getStudents(Request $req){
        $students = Student::all();
        if ($req->search) {
            $students = Student::where('name','like',"%$req->search%")->get();
        }
        return view('dashboard',['students'=>$students, 'search'=>$req->search]);
    }

    function add(Request $req){
        $req -> validate([
            'roll_no' => 'required',
            'name' => 'required',
            'city' => 'required',
            'detail' => 'required | min:15'
        ]);

        if (Student::where('roll_no', $req->roll_no)->exists()) {
            return redirect('add-student')->with('msg', 'Roll number already exists!');
        }

        $student = new Student();
        $student->roll_no = $req->roll_no;
        $student->name = $req->name;
        $student->city = $req->city;
        $student->detail = $req->detail;

        if ($student->save()) {
            return redirect('dashboard')->with('msg','New Student Added Successfully');
        }
        else{
            return redirect('add-student')->with('msg','An Error Occured');
        }
    }

    function delete($roll_no){
        $isDeleted = Student::destroy($roll_no);

        if($isDeleted){
            return redirect('dashboard')-> with('msg','Student '.$roll_no.' deleted successfully');
        }
    }

    function edit($roll_no){
        $student = Student::find($roll_no);
        return view('edit-student',['student'=>$student]);
    }

    function editStudent($roll_no, Request $req){        
        $req -> validate([
            'roll_no' => 'required',
            'name' => 'required',
            'city' => 'required',
            'detail' => 'required | min:15'
        ]);

        $student = Student::where('roll_no',$roll_no)->first();
        $student->name = $req->name;
        $student->city = $req->city;
        $student->detail = $req->detail;
        if ($student->save()) {
            return redirect('dashboard')->with('msg','Student '.$roll_no.' Updated Successfully');
        }
        else{
            return redirect()->action([StudentController::class, 'edit'])->with('msg', 'An error occured!');
        }
    }
}
