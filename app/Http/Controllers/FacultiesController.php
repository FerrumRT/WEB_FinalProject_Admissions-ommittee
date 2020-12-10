<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\EducationDegree;
use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return Faculty::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'skills' => $request['skills'],
            'outcomes' => $request['outcomes'],
            'leading_position' => $request['leading_position'],
            'education_degree_id' => $request['edu_deg']
        ]);
    }

    public function show(int $id)
    {
        $faculty = Faculty::find($id);
        $edu_name = EducationDegree::find($faculty->education_degree_id)->name;
        return view("pages/faculty/show")->with('title', "Faculty - Admission")->with("faculty", $faculty)->with('edu_name', $edu_name);
    }

    public function edit($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $faculties = Faculty::find($id);
        return view("pages/admin/faculties_edit")->with('title', "Faculties - Admission")->with("faculties", $faculties);
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
            'edu_deg' => 'required'
        ]);

        $faculty = Faculty::find($id);

        $faculty->name = $request->input('name');
        $faculty->description = $request->input('description');
        $faculty->skills = $request->input('skills');
        $faculty->outcomes = $request->input('outcomes');
        $faculty->leading_position = $request->input('leading_position');
        $faculty->education_degree_id = $request->input('edu_deg');

        $faculty->save();

        return redirect('/admin/faculties')->with('success', 'Admission member updated');
    }

    public function destroy($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
    }
}
