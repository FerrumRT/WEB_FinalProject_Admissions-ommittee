<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\EducationDegree;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'edu_deg' => 'required'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $user_id = User::where('email', $request['email'])->first()->id;

        Student::create([
            'user_id' => $user_id,
            'education_degree_id' => $request['edu_deg']
        ]);

        return redirect('/admin/students')->with('success', 'Student created');
    }

    public function show(int $id)
    {
        $student = Student::find($id);
        return view("pages/student/profile")->with('title', "Profile - Admission")->with("student", $student);
    }

    public function edit($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $student = Student::find($id);
        $edu_deg = EducationDegree::all();
        return view("pages/admin/student_edit")->with('title', "Student - Admission")->with("student", $student)->with("edu_deg", $edu_deg);
    }


    public function update(Request $request, $id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $student = Student::find($id);
        $user = User::find($student->user_id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone_number = $request->input('phone_number');
        $user->birthdate = $request->input('birthdate');

        $user->save();

        $student->school_name = $request->input('school_name');
        $student->university_name = $request->input('university_name');
        $student->education_degree_id = $request->input('edu_deg');

        $student->save();

        return redirect('/admin/students')->with('success', 'AStudent updated');
    }

    public function destroy($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $student = Student::find($id);
        $student->delete();
        return redirect('/admin/students')->with('success', '$student deleted');
    }
}
