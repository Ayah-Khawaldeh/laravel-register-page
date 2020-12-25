<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

class EmployeeController extends Controller

{
    public function form(){
        return view ('users');
    }


    public function index(Request $request){


        $name           =request('name');
        $email          =request('email');
        $username       =request('username');
        $phone          =request('phone');
        $password       =request('password');

        // $allusers       =array();
        // $allusers       =[$username,$name,$phone,$email];



        $validatedInputs=$request->validate([
            "email"=>"required|email",
            "password" => "required|min:8|max:16",
            "username" => "required",
            "phone" => "required|digits:14 ",
            "name" => "required"

       
        ]);


        Employee::create([
            "email"=>$email,
            "password"=>$password,
            "mobile"=>$phone,
            "fullname"=>$name,

        ]);

        // $all_employees =Employee::all();

        // dd($all_employees[0]);
        
        // return view('userstable' , compact('all_employees'));

        return redirect ('userstable');



}


public function show(){

    $all_employees =Employee::all();

        // dd($all_employees[0]);
        
    return view('userstable' , compact('all_employees'));
}


public function delete($employee_id){

    $employee_by_id=Employee::where('employee_id', $employee_id)->delete();
    
    
    return redirect ('userstable');

    
}


}