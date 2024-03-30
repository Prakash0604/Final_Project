<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use App\Models\student;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    public function dashboard(){
        $classactive=classroom::where('status','=','Active')->count();
        $classinactive=classroom::where('status','=','inactive')->count();
        $totalclass=classroom::all()->count();
        $totalstudent=student::all()->count();
        $studentactive=student::where('status','=','Active')->count();
        $studentinactive=student::where('status','=','inactive')->count();
        $data=compact('classactive','classinactive','totalclass','totalstudent','studentactive','studentinactive');
        return view('Students.Dashboard')->with($data);
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login')->with('logout','Logout Successfully');
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
    public function loadclasslist(Request $request){
        $class_status=$request->class_status;
        if($class_status!=""){
            $classes=classroom::where('status',$class_status)->paginate(5);
            // Total Student list shown query start
            foreach ($classes as $class) {
                $totalStudents = Student::where('stu_class', $class->id)->count();
                $class->total_students = $totalStudents;
            }        
            // Total Student list shown query End
        }else{
            $classes=classroom::paginate(5);
            foreach ($classes as $class) {
                $totalStudents = Student::where('stu_class', $class->id)->count();
                $class->total_students = $totalStudents;
            }        
        }
        // $totalstudents = classroom::withCount('student')->get();
        // $totalstudents=student::with('classroom')->where('stu_class')->count();

        // $classes = Classroom::all();
    
        $data=compact('classes','class_status');
        return view('Students.classroomview')->with($data);
        // return  $data;
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
    public function reports(){
        return view('Students.Reports');
    }
    public function active(){
        $active=classroom::where('status','=','Active')->paginate(5);
        $data=compact('active');
        return view('Students.classroom.active')->with($data);
    }
    public function inactive(){
        $inactive=classroom::where('status','=','Inactive')->paginate(5);
        $data=compact('inactive');
        return view('Students.classroom.inactive')->with($data);
    }
    public function change_password(){
        return view('Students.change-password');
    }

public function update_password(Request $request){
    $request->validate([
        'ctpassword' => 'required',
        'npassword' => 'required',
        'cpassword'=>'required|same:npassword',
    ]);
    $users = Auth::user();

    if (!Hash::check($request->input('ctpassword'), $users->password)) {
        return redirect()->back()->with('current_password','Incorrect current password');
    }
    $user=User::where('id',$users['id'])->update([
        'password'=>Hash::make($request->npassword),
    ]);
    return redirect('password-change')->with('success', 'Password changed successfully');
}
public function stuadd(){
    $classrooms=classroom::where('status','Active')->get();
    return view('Students.StudentAdd',compact('classrooms'));
}
public function stustore(Request $request){
    $request->validate([
        'stu_name'=>'required',
        'stu_address'=>'required',
        'stu_contact'=>'required|numeric|min:10',
        'stu_dob'=>'required',
        'stu_image'=>'image',
    ]);
    // dd($request->all());
    $exe=null;
    // $img1=$request->stu_image;
    if($request->stu_image){
        $img1=$request->stu_image;
        $exe=$img1->getclientOriginalName();
        $img1->storeAs('public/images/'.$exe);
    }

    $students=student::insert([
        'stu_name'=>$request->stu_name,
        'stu_address'=>$request->stu_address,
        'stu_contact'=>$request->stu_contact,
        'stu_dob'=>$request->stu_dob,
        'stu_gender'=>$request->stu_gender,
        'stu_class'=>$request->stu_class,
        'stu_image'=>$exe,
        'status'=>$request->status,
        'stu_desc'=>$request->stu_desc,
    ]);
    return redirect('student/add')->with('success','Student Added Successfully');
}
public function loadstudentview(){
    $students=student::join('classrooms','students.stu_class','=','classrooms.id')->get();
    return view('Students.StudentView',compact('students'));
}
public function loadallstudent(Request $request){
    if($request->status!="")
    {
        $students=student::where('status',$request->status)->paginate(5);
    }else{

        $students=student::paginate(5);
    }
    
    // $students->all();
    return view('Students.AllStudentList',compact('students'));
}

public function classroomstudent($id){
    $classstu=student::where('stu_class',$id)->get();
    return view('Students.classroom.classroomstudent',['classstu'=>$classstu]);
    
}
public function activestudentlist(){
    $activestudent=student::where('status','=','Active')->get();
    return view('Students.Activestudentlist',compact('activestudent'));
}
public function inactivestudentlist(){
    $inactivestudent=student::where('status','=','Inactive')->get();
    return view('Students.Inactivestudentlist',compact('inactivestudent'));
}
}
