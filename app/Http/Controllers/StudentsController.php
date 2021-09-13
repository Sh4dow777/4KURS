<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StudentsController extends Controller
{
    public function GetStudent()
    {
        return response()->json(Student::get());
    }

    public function AddStudent(Request $req)
    {
        $validator=Validator::make($req->all(),
            [
                'name'=>'required',
                'second_name'=>'required',
            ]);
        if($validator->fails())
            return response()->json($validator->errors());

        Student::create($req->all());
        return response()->json('Entry Added');
    }
    public function UpdateStudent(Request $req)
    {
        $student=Student::where('id',$req->id)->first();

        if(!$student)
            return response()->json('Entry not found');
        $student->update($req->all());
        return response()->json("Entry update");    
    }
    public function DeleteStudent(Request $req)
    {
        $student=Student::where('id',$req->id)->first();

        if(!$student)
            return response()->json('Entry not found');
        $student->delete();
            return response()->json("Entry deleted");
    }
    public function RegistrationStudent(Request $req)
    {
        $validator=Validator::make($req->all(),
            [
                'name'=>'required',
                'second_name'=>'required',
                'login'=>'required',
                'password'=>'required',

            ]);
        if($validator->fails())
            return response()->json($validator->errors());

        Student::create($req->all());
        return response()->json('Entry Added');
    }
     public function AuthorizationStudent(Request $req)
     {
         $validator = Validator::make($req->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);
 
        $student = Student::where("login",$req->login)->first();

        if($validator->fails())
        {
            if(!$student || $req->password != $student->password)
                return respoonse()->json("Login or password is invalid");
            return response()->json($validator->errors());
        }

        $student->api_token = Str::random(50);
        $student->save();
        return response()->json($student->name.", you logged in! api_token: ".$student->api_token);
     }
}
