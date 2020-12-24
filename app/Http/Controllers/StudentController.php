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
    private function isAdission(){
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
    }

    private function isStudent(int $id){
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        if (Auth::user()->id != $id && !Auth::user()->is_adm_member)
            return redirect('/403');
    }

    public function store(Request $request)
    {
        $this->isAdission();
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
        $this->isStudent($id);
        $user = User::find($id);
        $student = Student::where('user_id',$user->id)->first();
        $edu_deg = EducationDegree::all();
        return view("pages/student/profile")->with('title', "Profile - Admission")->with("student", $student)->with("edu_deg", $edu_deg);
    }

    public function edit($id)
    {
        $this->isAdission();
        $student = Student::find($id);
        $edu_deg = EducationDegree::all();
        return view("pages/admin/student_edit")->with('title', "Student - Admission")->with("student", $student)->with("edu_deg", $edu_deg);
    }

    public function update_profile(Request $request, $id)
    {
        $this->isStudent($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->birthdate = $request->input('birthdate');

        $user->save();

        return redirect('/profile/student/'.$id)->with('success', 'Profile updated');
    }

    public function update_photo(Request $request, $id)
    {
        $this->isStudent($id);

        $this->validate($request, [
            'image' => 'required'
        ]);

        $student = Student::where('user_id', $id)->first();

        if (!empty($request->file('image'))) {
            $img_path = $request->file('image')->store('img/student_img', 'public');
            $student->student_picture_url = '/storage/'.$img_path;
        }

        $student->save();

        return redirect('/profile/student/'.$id)->with('success', 'Profile photo updated');
    }

    public function upload_document(Request $request, $id)
    {
        $this->isStudent($id);

        $this->validate($request, [
            'file' => 'required|mimetypes:application/pdf'
        ]);

        $student = Student::where('user_id', $id)->first();

        if (!empty($request->file('file'))) {
            $doc_path = $request->file('file')->store('confirm_doc', 'public');
            $student->confirm_documents_url = '/storage/'.$doc_path;
        }

        $student->save();

        return redirect('/profile/student/'.$id)->with('success', 'Confirmation document uploaded');
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

        $old = $request->input('old_password');
        $new = $request->input('new_password');
        $re_new = $request->input('re_new_password');

        if ($re_new != $new || !(Hash::check($old, $user->password)))
            return redirect('/profile/admission/'.$id)->with('error', 'Passwords are not match');

        $user->password = Hash::make($new);

        $user->save();

        return redirect('/profile/student/'.$id)->with('success', 'Profile updated');
    }

    public function update(Request $request, $id)
    {
        $this->isAdission();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $student = Student::find($id);
        $user = User::find($student->user_id);


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

        return redirect('/admin/students')->with('success', 'AStudent updated');
    }

    public function destroy($id)
    {
        $this->isAdission();
        $student = Student::find($id);
        $user = User::find($student->user_id);
        $student->delete();
        $user->delete();

        return redirect('/admin/students')->with('success', '$student deleted');
    }
}
