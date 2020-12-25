<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\EducationDegree;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\Subset;

class StudentController extends Controller
{
    private function isAdission()
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (Auth::user()->student_id == null)
            abort(403);
    }

    private function isStudent(int $id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (Auth::user()->student_id == null)
            abort(403);
        if (Auth::user()->id != $id && Auth::user()->student_id == null)
            abort(403);
    }

    public function store(Request $request)
    {
        $this->isAdission();
        $this->validate($request, [
            'name' => 'required | regex:/^[\pL\s-]+$/u',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8',
            'edu_deg' => 'required'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $user = User::where('email', $request['email'])->first();

        Student::create([
            'user_id' => $user->id,
            'education_degree_id' => $request['edu_deg']
        ]);

        $student_id = Student::where('user_id', $user->id)->first()->id;

        $user->student_id = $student_id;

        $user->save();

        return redirect('/admin/students')->with('success', 'Student created');
    }

    public function show(int $id)
    {
        $user = User::find($id);
        if ($user == null)
            abort(404);
        $student = Student::where('user_id', $user->id)->first();
        if ($student == null)
            abort(404);
        $edu_deg = EducationDegree::all();
        return view("pages/student/profile")->with('title', "Profile - Admission")->with("student", $student)->with("edu_deg", $edu_deg);
    }

    public function edit($id)
    {
        $this->isAdission();
        $student = Student::find($id);
        if ($student == null)
            abort(404);
        $edu_deg = EducationDegree::all();
        return view("pages/admin/student_edit")->with('title', "Student - Admission")->with("student", $student)->with("edu_deg", $edu_deg);
    }

    public function update_profile(Request $request, $id)
    {
        $this->isStudent($id);

        $this->validate($request, [
            'name' => 'required | regex:/^[\pL\s-]+$/u'
        ]);

        $user = User::find($id);
        if ($user == null)
            abort(404);
        $student = Student::where('user_id', $id)->first();
        if ($student == null)
            abort(404);

        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->birthdate = $request->input('birthdate');
        if (!empty($request->input('school_name')))
            $student->school_name = $request->input('school_name');
        if (!empty($request->input('university_name')))
            $student->university_name = $request->input('university_name');
        $student->education_degree_id = $request->input('edu_deg');

        $user->save();
        $student->save();

        return redirect('/profile/student/' . $id)->with('success', 'Profile updated');
    }

    public function update_photo(Request $request, $id)
    {
        $this->isStudent($id);

        $this->validate($request, [
            'image' => 'required|image'
        ]);

        $student = Student::where('user_id', $id)->first();
        if ($student == null)
            abort(404);

        if (!empty($request->file('image'))) {
            $img_path = $request->file('image')->store('img/student_img', 'public');
            $student->student_picture_url = '/storage/' . $img_path;
        }

        $student->save();

        return redirect('/profile/student/' . $id)->with('success', 'Profile photo updated');
    }

    public function upload_document(Request $request, $id)
    {
        $this->isStudent($id);

        $this->validate($request, [
            'file' => 'required|mimetypes:application/pdf'
        ]);

        $student = Student::where('user_id', $id)->first();
        if ($student == null)
            abort(404);

        if (!empty($request->file('file'))) {
            $doc_path = $request->file('file')->store('confirm_doc', 'public');
            $student->confirm_documents_url = '/storage/' . $doc_path;
        }

        $student->save();

        return redirect('/profile/student/' . $id)->with('success', 'Confirmation document uploaded');
    }

    public function update_password(Request $request, $id)
    {
        $this->isStudent($id);

        $this->validate($request, [
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            're_new_password' => 'required|min:8',
        ]);

        $user = User::find($id);
        if ($user == null)
            abort(404);

        $old = $request->input('old_password');
        $new = $request->input('new_password');
        $re_new = $request->input('re_new_password');

        if ($re_new != $new || !(Hash::check($old, $user->password)))
            return redirect('/profile/admission/' . $id)->with('error', 'Passwords are not match');

        $user->password = Hash::make($new);

        $user->save();

        return redirect('/profile/student/' . $id)->with('success', 'Profile updated');
    }

    public function update(Request $request, $id)
    {
        $this->isAdission();
        $this->validate($request, [
            'name' => 'required | regex:/^[\pL\s-]+$/u',
            'email' => 'required | email',
            'image' => 'image'
        ]);

        $student = Student::find($id);
        if ($student == null)
            abort(404);
        $user = User::find($student->user_id);
        if ($user == null)
            abort(404);


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->birthdate = $request->input('birthdate');

        $user->save();

        $student->school_name = $request->input('school_name');
        $student->university_name = $request->input('university_name');
        $student->education_degree_id = $request->input('edu_deg');
        if (!empty($request->file('image'))) {
            $img_path = $request->file('image')->store('img/student_img', 'public');
            $student->student_picture_url = '/storage/' . $img_path;
        }
        $student->save();

        return redirect('/admin/students')->with('success', 'A student updated');
    }

    public function destroy($id)
    {
        $this->isAdission();
        $student = Student::find($id);
        if ($student == null)
            abort(404);
        $user = User::find($student->user_id);
        if ($user == null)
            abort(404);
        $student->delete();
        $user->delete();

        return redirect('/admin/students')->with('success', '$student deleted');
    }
}
