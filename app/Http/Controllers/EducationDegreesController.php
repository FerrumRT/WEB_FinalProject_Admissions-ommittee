<?php

namespace App\Http\Controllers;

use App\EducationDegree;
use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationDegreesController extends Controller
{
    public function index()
    {

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
            'name' => 'required'
        ]);

        EducationDegree::create([
            'name' => $request['name']
        ]);
        return redirect('/admin/education_degrees')
            ->with('success', 'Education created');
    }

    public function show($name)
    {
        $edu_deg = EducationDegree::all();
        $deg = EducationDegree::all()->where('name', '=', $name)->first();
        $faculties = Faculty::all()->where('education_degree_id', '=', $deg->id);
        return view("pages/edu_deg/show")
            ->with('title', "Education Degree - Admission")
            ->with("deg", $deg)->with("edu_deg", $edu_deg)
            ->with("faculties", $faculties);
    }

    public function edit($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $edu_deg = EducationDegree::find($id);
        return view("pages/admin/edu_deg_edit")->with('title', "Education Degree - Admission")->with("edu_deg", $edu_deg);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $this->validate($request, [
            'name' => 'required'
        ]);

        $edu_deg = EducationDegree::find($id);

        $edu_deg->name = $request->input('name');

        $edu_deg->save();

        return redirect('/admin/education_degrees')->with('success', 'Education updated');
    }

    public function destroy($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $edu_deg = EducationDegree::find($id);
        $edu_deg->delete();
        return redirect('/admin/education_degrees')->with('success', 'Education updated');
    }
}
