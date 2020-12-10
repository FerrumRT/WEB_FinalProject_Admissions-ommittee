<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Faculty;

class PageController extends Controller
{
    public function index(){
        $faculties = Faculty::all();
        $news = News::all();
        return view("pages/home")->with('title', "Home - Admission")->with("faculties", $faculties)->with("news", $news);
    }

    public function accessForbidden(){
        return view('pages.403');
    }

    public function about_us(){
        return view("pages/about")->with('title', "About - Admission");
    }

    public function contacts(){
        return view("pages/contacts")->with('title', "Contacts - Admission");
    }

    public function bachelor(){
        $faculties = Faculty::all();
        foreach ($faculties as $faculty){
            if($faculty->education_degree_id != 1){
                $faculties->except($faculty);
            }
        }
        return view("pages/bachelor")->with('title', "Bachelor Program - Admission")->with('faculties', $faculties);
    }
}
