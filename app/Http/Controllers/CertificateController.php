<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\EducationDegree;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
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


    public function show(int $id, Request $request)
    {
        $this->isStudent($id);
        $student = Student::where('user_id',$id)->first();
        $edu_deg = EducationDegree::all();
        $name = $request->input('certificate');
        if (!empty($name))
            $certificates = Certificate::where('student_id', $student->id)->where('name','LIKE', '%'.$name.'%')->get();
        else
            $certificates = Certificate::where('student_id', $student->id)->get();
        return view("pages/student/profilec")->
        with('title', "Profile")->
        with("student", $student)->
        with("certificates", $certificates)->
        with("edu_deg", $edu_deg);
    }


    public function upload_certificate(Request $request, $id)
    {
        $this->isStudent($id);

        $this->validate($request, [
            'file' => 'required|mimetypes:application/pdf',
            'name' => 'required'
        ]);

        $student_id = DB::table('students')->where('user_id', $id)->first()->id;

        $doc = $request->file('file')->store('confirm_doc', 'public');
        $doc_path = '/storage/'.$doc;

        Certificate::create([
            'name' => $request['name'],
            'certificate_url' => $doc_path,
            'student_id' => $student_id
        ]);

        return redirect('/student/'.$id.'/certificates')->with('success', 'Certificate uploaded');
    }



    public function destroy($id)
    {
        $this->isAdission();

        $user = DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->join('certificates', 'students.id', '=', 'certificates.student_id')
            ->where('certificates.id', $id)
            ->select('users.*')
            ->first();

        $certificate = Certificate::find($id);
        $certificate->delete();

        return redirect('/student/'.$user->id.'/certificates')->with('success', 'Certificate deleted');
    }
}
