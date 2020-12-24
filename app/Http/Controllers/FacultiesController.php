<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\EducationDegree;
use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacultiesController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_admin)
            return redirect('/403');
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'edu_deg' => 'required'
        ]);
        Faculty::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'skills' => empty($request['skills'])? "":$request['skills'],
            'outcomes' => empty($request['outcomes'])? "":$request['outcomes'],
            'leading_position' => empty($request['leading_position'])? "":$request['leading_position'],
            'education_degree_id' => $request['edu_deg']
        ]);
        return redirect("/admin/faculties")->with('success', 'Faculty added');
    }

    public function show(int $id)
    {
        $faculty = Faculty::find($id);
        $edu_name = EducationDegree::find($faculty->education_degree_id)->name;
        $edu_deg = EducationDegree::all();
        return view("pages/faculty/show")
            ->with('title', "Faculty - Admission")
            ->with("faculty", $faculty)
            ->with('edu_name', $edu_name)
            ->with('edu_deg', $edu_deg);
    }

    public function edit($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_admin)
            return redirect('/403');
        $faculties = Faculty::find($id);
        $edu_deg = EducationDegree::all();
        return view("pages/admin/faculty_edit")
            ->with('title', "Faculties - Admission")
            ->with("faculty", $faculties)
            ->with("edu_deg", $edu_deg);
    }


    public function update(Request $request, $id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_admin)
            return redirect('/403');
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'edu_deg' => 'required'
        ]);

        $faculty = Faculty::find($id);
        if(!empty($request->file('image'))){
            $img_path = $request->file('image')->store('img/faculty_img', 'public');
            $faculty->image_url = '/storage/'.$img_path;
        }
        $faculty->name = $request->input('name');
        $faculty->description = $request->input('description');
        if(!empty($request['skills']))
            $faculty->skills = $request->input('skills');
        else $faculty->skills = "";
        if(!empty($request['outcomes']))
            $faculty->outcomes = $request->input('outcomes');
        else $faculty->outcomes = "";
        if(!empty($request['leading_position']))
            $faculty->leading_position = $request->input('leading_position');
        else $faculty->leading_position  = "";
        $faculty->education_degree_id = $request->input('edu_deg');

        $faculty->save();

        return redirect('/admin/faculties')->with('success', 'Faculty updated');
    }

    public function destroy($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_admin)
            return redirect('/403');
        $faculty = Faculty::find($id);
        $faculty->delete();
        return redirect('/admin/faculties')->with('success', 'Faculty deleted');
    }
}
