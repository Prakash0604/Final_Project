<?php

namespace App\Http\Controllers;

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
}
