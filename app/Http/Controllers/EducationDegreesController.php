<?php

namespace App\Http\Controllers;

use App\EducationDegree;
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

        return EducationDegree::create([
            'name' => $request['name']
        ]);
    }

    public function show($id)
    {
        $edu_deg = EducationDegree::find($id);
        return view("pages/faculty/show")->with('title', "Education Degree - Admission")->with("edu_deg", $edu_deg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
