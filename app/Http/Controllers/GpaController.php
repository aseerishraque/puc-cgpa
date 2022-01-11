<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use App\User;

class GpaController extends Controller
{
    public function login(){
        return view("login");
    }

    public function loginCheck(Request $request){
        $user = User::where("username", $request->username)
                    ->where("password", $request->password)
                    ->first();
        if(!is_null($user)){
            session()->put("user_id", $user->id);
            return redirect()->route("cgpa");
        }else{
            return redirect()->route("login")->with([
                'message' => "Username/Password Incorrect!"
            ]);
        }
    }

    public function cgpaStore(Request $request)
    {
        $gpa = new Result();
        $gpa->semester = $request->semester;
        $gpa->user_id = session()->get("user_id");
        $gpa->course = $request->course;
        $gpa->marks = $request->marks;
        $gpa->credit = $request->credit;
        $gpa->gpa = $request->gpa;
        $gpa->save();

        return redirect()->route('cgpa');
    }

    public function cgpa(){
        return view("cgpa");
    }

    public function register(){
        return view("register");
    }

    public function registerProcess(Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->password = $request->password;
        if($user->save()){
            return redirect()->route('login')->with([
                'success' => "Successfully Registered!"
            ]);
        }else{
            return redirect()->route('login')->with([
                'error' => "Error Registering!"
            ]);
        }
    }
}
