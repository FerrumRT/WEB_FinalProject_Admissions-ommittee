<?php

namespace App\Http\Controllers;

use App\EducationDegree;
use App\Faculty;
use App\News;
use App\AdmissionMember;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show_faculties()
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $faculties = Faculty::all();
        $edu_deg = EducationDegree::all();
        return view("pages/admin/faculties")->with('title', "Faculties - Admission")->with("faculties", $faculties)->with("edu_deg", $edu_deg);
    }

    public function show_admission_member()
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $ad_members = AdmissionMember::all();
        return view("pages/admin/ad_mem")->with('title', "Admission Members - Admission")->with("ad_members", $ad_members);
    }

    public function show_edu_deg()
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $edu_deg = EducationDegree::all();
        return view("pages/admin/edu_deg")->with('title', "Admission Members - Admission")->with("edu_deg", $edu_deg);
    }

    public function show_students()
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $students = Student::all();
        $edu_deg = EducationDegree::all();
        return view("pages/admin/student")->with('title', "Stundets - Admission")->with("students", $students)->with("edu_deg", $edu_deg);
    }
}
