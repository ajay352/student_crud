<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Student;


class StudentController extends Controller
{
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        student::create($request->all());

        return response(['success' => 'Student Data created successfully.']);
    }
    public function show(){
        $student=student::all();
        return view('students.show',compact('student'));
    }
    public function remove($id){

        student::find($id)->delete($id);
  
        return response(['success' => 'Student Data Deleted successfully.']);

    }
}
