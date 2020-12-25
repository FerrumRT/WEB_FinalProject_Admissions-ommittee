<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\EducationDegree;
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

    private function isAdmission(){
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_admin)
            abort(403);
    }

    private function isAdmissionId(int $id){
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_admin)
            abort(403);
        if (Auth::user()->id != $id)
            abort(403);
    }

    public function store(Request $request)
    {
        $this->isAdmission();
        $this->validate($request, [
            'name' => 'required | regex:/^[\pL\s-]+$/u',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        $user = User::where('email', $request['email'])->first();

        AdmissionMember::create([
            'user_id' => $user->id
        ]);

        $ad_mem_id = AdmissionMember::where('user_id', $user->id)->first()->id;

        $user->admission_member_id = $ad_mem_id;
        $user->save();

        return redirect('/admin/admission_members')->with('success', 'Admission member created');
    }

    public function show(int $id)
    {
        $this->isAdmissionId($id);
        $user = User::find($id);
        if($user==null)
            abort(404);
        $admission_member = AdmissionMember::where('user_id',$user->id)->first();
        if($admission_member==null)
            abort(404);
        $ad_mem_img = \Storage::disk('public')->url($admission_member->image_url);
        $edu_deg = EducationDegree::all();
        return view("pages/ad_mem/profile")->with('title', "Profile - Admission")
            ->with("admission_member", $admission_member)
            ->with("edu_deg", $edu_deg)
            ->with("ad_mem_img", $ad_mem_img);
    }

    public function edit($id)
    {
        $this->isAdmission();

        $admission_member = AdmissionMember::find($id);
        if($admission_member==null)
            abort(404);
        return view("pages/admin/ad_mem_edit")->with('title', "Admission Members - Admission")->with("admission_member", $admission_member);
    }

    public function update_profile(Request $request, $id)
    {
        $this->isAdmissionId($id);

        $this->validate($request, [
            'name' => 'required | regex:/^[\pL\s-]+$/u'
        ]);

        $user = User::find($id);

        if($user==null)
            abort(404);

        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->birthdate = $request->input('birthdate');

        $user->save();

        return redirect('/profile/admission/'.$id)->with('success', 'Profile updated');
    }

    public function update_photo(Request $request, $id)
    {
        $this->isAdmissionId($id);

        $this->validate($request, [
            'image' => 'required|image'
        ]);

        $admission_member = AdmissionMember::where('user_id', $id)->first();
        if($admission_member == null)
            abort(404);

        if (!empty($request->file('image'))) {
            $img_path = $request->file('image')->store('img/ad_mem_img', 'public');
            $admission_member->image_url = '/storage/'.$img_path;
        }

        $admission_member->save();

        return redirect('/profile/admission/'.$id)->with('success', 'Profile photo updated');
    }

    public function update_password(Request $request, $id)
    {
        $this->isAdmissionId($id);

        $this->validate($request, [
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            're_new_password' => 'required|min:8',
        ]);

        $user = User::find($id);

        if ($user == null)
            abort(404);

        $old = $request->input('old_password');
        $new = $request->input('new_password');
        $re_new = $request->input('re_new_password');

        if ($re_new != $new || !(Hash::check($old, $user->password)))
            return redirect('/profile/admission/'.$id)->with('error', 'Passwords are not match');

        $user->password = Hash::make($new);

        $user->save();

        return redirect('/profile/admission/'.$id)->with('success', 'Profile updated');
    }

    public function update(Request $request, $id)
    {
        $this->isAdmission();
        $this->validate($request, [
            'name' => 'required | regex:/^[\pL\s-]+$/u',
            'email' => 'required | email',
            'image' => 'image'
        ]);

        $admission_member = AdmissionMember::find($id);
        if($admission_member==null)
            abort(404);
        $user = User::find($admission_member->user_id);
        if($user==null)
            abort(404);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('old_password') != ""
            && $request->input('new_password') != ""
            && Hash::check($request->input('old_password'), $user->password))
            $user->password = Hash::make($request->input('new_password'));
        else if($request->input('old_password') != ""
            && $request->input('new_password') != "")
            return redirect('/admin/'.$id.'/editAdmissionMember')->with('error', 'Passwords doesnt match');
        $user->phone_number = $request->input('phone_number');
        $user->birthdate = $request->input('birthdate');
        if (!empty($request->file('image'))) {
            $img_path = $request->file('image')->store('img/ad_mem_img', 'public');
            $admission_member->image_url = '/storage/' . $img_path;
        }
        $user->save();

        $admission_member->save();

        return redirect('/admin/admission_members')->with('success', 'Admission member updated');
    }

    public function destroy($id)
    {
        $this->isAdmission();
        $admission_member = AdmissionMember::find($id);
        if($admission_member==null)
            abort(404);
        $user = User::find($admission_member->user_id);
        if($user==null)
            abort(404);
        $admission_member->delete();
        $user->delete();
        return redirect('/admin/admission_members')->with('success', 'Admission member deleted');
    }
}
