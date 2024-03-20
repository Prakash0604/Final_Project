<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard(){
        return view('Students.Dashboard');
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login')->with('logout','Logout Successfully');
    }
    public function stuadd(){
        return view('Students.StudentAdd');
    }
    public function loadclassroom(){
        return view('Students.classroomadd');
    }
    public function storeclassroom(Request $request){
        $request->validate([
            'class_name'=>'required|unique:classrooms',
        ]);
        $classroom=classroom::insert([
            'class_name'=>$request->class_name,
            'class_desc'=>$request->class_desc,
            'status'=>$request->status,
        ]);
        return back()->with('classadd','Classroom Added successfully');
    }
    public function loadclasslist(){
        $classes=classroom::all();
        return view('Students.classroomview',compact('classes'));
    }
    public function loadclassedit($id){
        $classrooms=classroom::findOrFail($id);
        return view('Students.ClassroomEdit',compact('classrooms'));
    }
    
    public function storeclassedit(Request $request,$id){
        $request->validate([
            'class_name'=>'required',
        ]);
        if($request->status){
            $status="Active";
        }
        $update=classroom::where('id',$id)->update([
            'class_name'=>$request->class_name,
            'class_desc'=>$request->class_desc,
            'status'=>$request->status,
        ]);
        return redirect('/classroom/view')->with('update','Classroom updated successfully');
    }
    public function classdel($id){
        $class=classroom::where('id',$id)->get();
        if(count($class)>0){
            $classroom=classroom::find($id);
            $classroom->delete();
            return back()->with('delete','Classroom deleted successfully');
        }else{
            return redirect('classroom/view')->with('nodata','classroom not found to delete');
        }
    }
}
