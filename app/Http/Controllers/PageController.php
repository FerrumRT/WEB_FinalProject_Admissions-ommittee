<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\EducationDegree;
use App\News;
use Illuminate\Http\Request;
use App\Faculty;

class PageController extends Controller
{
    public function index(){
        $edu_deg = EducationDegree::all();
        $faculties = Faculty::all();
        $news = News::all();
        return view("pages/home")->with('title', "Home - Admission")->with("faculties", $faculties)->with("news", $news)->with("edu_deg", $edu_deg);
    }

    public function accessForbidden(){
        $edu_deg = EducationDegree::all();
        return view('errors.403')->with('title', '403')->with("edu_deg", $edu_deg);
    }

    public function pageNotFound(){
        $edu_deg = EducationDegree::all();
        return view('errors.404')->with('title', '404')->with("edu_deg", $edu_deg);
    }

    public function about_us(){
        $edu_deg = EducationDegree::all();
        return view("pages/about")->with('title', "About - Admission")->with("edu_deg", $edu_deg);
    }

    public function contacts(){
        $edu_deg = EducationDegree::all();
        $adm_mem = AdmissionMember::all();
        return view("pages/contacts")
            ->with('title', "Contacts - Admission")
            ->with("edu_deg", $edu_deg)
            ->with("adm_mem", $adm_mem);
    }

    public function bachelor(){
        $edu_deg = EducationDegree::all();
        $faculties = Faculty::all();
        foreach ($faculties as $faculty){
            if($faculty->education_degree_id != 1){
                $faculties->except($faculty);
            }
        }
        return view("pages/bachelor")->with('title', "Bachelor Program - Admission")->with('faculties', $faculties)->with("edu_deg", $edu_deg);
    }
}
