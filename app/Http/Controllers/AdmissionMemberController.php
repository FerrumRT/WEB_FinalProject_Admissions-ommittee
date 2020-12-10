<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\Http\Controllers\Auth\RegisterController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdmissionMemberController extends Controller
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
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_adm_member' => true
        ]);

        $user_id = User::where('email', $request['email'])->first()->id;

        AdmissionMember::create([
            'user_id' => $user_id
        ]);

        return redirect('/admin/admission_members')->with('success', 'Admission member created');
    }

    public function show(int $id)
    {
        $admission_member = AdmissionMember::find($id);
        return view("pages/adm_member/profile")->with('title', "Profile - Admission")->with("admission_member", $admission_member);
    }

    public function edit($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $admission_member = AdmissionMember::find($id);
        return view("pages/admin/ad_mem_edit")->with('title', "Admission Members - Admission")->with("admission_member", $admission_member);
    }


    public function update(Request $request, $id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $admission_member = AdmissionMember::find($id);
        $user = User::find($admission_member->user_id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone_number = $request->input('phone_number');
        $user->birthdate = $request->input('birthdate');

        $user->save();

        return redirect('/admin/admission_members')->with('success', 'Admission member updated');
    }

    public function destroy($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('/403');
        $admission_member = AdmissionMember::find($id);
        $admission_member->delete();
        return redirect('/admin/admission_members')->with('success', 'Admission member deleted');
    }
}
