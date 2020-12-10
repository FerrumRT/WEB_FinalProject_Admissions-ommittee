<?php

namespace App\Http\Controllers;

use App\EducationDegree;
use App\Faculty;
use App\News;
use App\AdmissionMember;
use App\User;
use App\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show_faculties()
    {
        $faculties = Faculty::all();
        $edu_deg = EducationDegree::all();
        return view("pages/admin/faculties")->with('title', "Faculties - Admission")->with("faculties", $faculties)->with("edu_deg", $edu_deg);
    }

    public function show_admission_member()
    {
        $ad_members = AdmissionMember::all();
        return view("pages/admin/ad_mem")->with('title', "Admission Members - Admission")->with("ad_members", $ad_members);
    }


    public function admission_member()
    {

    }
}
