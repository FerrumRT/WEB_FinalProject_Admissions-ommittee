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
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'skills' => 'required',
            'outcomes' => 'required',
            'leading_position' => 'required',
            'edu_deg' => 'required'
        ]);
        Faculty::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'skills' => $request['skills'],
            'outcomes' => $request['outcomes'],
            'leading_position' => $request['leading_position'],
            'education_degree_id' => $request['edu_deg']
        ]);
        return redirect("/admin/faculties")->with('success', 'Faculty added');
    }

    public function show(int $id)
    {
    }

    public function edit($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
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
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'skills' => 'required',
            'outcomes' => 'required',
            'leading_position' => 'required',
            'edu_deg' => 'required',
            'image' => 'required'
        ]);

        $faculty = Faculty::find($id);

        $img = \Image::make($request->file('image'));
        $img_path = storage_path('app/public/img/faculty_img/'.'fac_'.$faculty->id.'_img'.'.jpg');
        $img->save($img_path);

        $faculty->name = $request->input('name');
        $faculty->description = $request->input('description');
        $faculty->skills = $request->input('skills');
        $faculty->outcomes = $request->input('outcomes');
        $faculty->leading_position = $request->input('leading_position');
        $faculty->education_degree_id = $request->input('edu_deg');
        $faculty->image_url = $img_path;

        $faculty->save();

        return redirect('/admin/faculties')->with('success', 'Faculty updated');
    }

    public function destroy($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
    }
}
