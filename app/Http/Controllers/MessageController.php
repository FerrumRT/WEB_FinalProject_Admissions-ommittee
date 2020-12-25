<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\Chat;
use App\EducationDegree;
use App\Message;
use App\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function show_student()
    {
        $student = Student::where('user_id',AUTH::id())->first();
        $edu_deg = EducationDegree::all();
        $chats = Chat::where('student_id', $student->id)->get();
        return view("pages/online_reception/reception_student")
            ->with('title', "Online reception")
            ->with("student", $student)
            ->with("edu_deg", $edu_deg)
            ->with("chats", $chats);
    }

    public function show_admission()
    {
        $admission_member = AdmissionMember::where('user_id',AUTH::id())->first();
        $edu_deg = EducationDegree::all();
        $chats = Chat::where('admission_member_id', $admission_member->id)->get();
        $messages = Message::where('read_by_receiver', 0)->get();
        return view("pages/online_reception/reception_admission")
            ->with('title', "Online reception")
            ->with("admission_member", $admission_member)
            ->with("edu_deg", $edu_deg)
            ->with("chats", $chats)
            ->with("messages", $messages);
    }

    public function send_student(Request $request, $id)
    {
        $this->validate($request, [
            'message_text' => 'required | min:5',
        ]);

        $student = Student::where('user_id', $id)->first();

        Message::create([
            'message_text' => $request['message_text'],
            'read_by_receiver' => false,
            'send_date' => Carbon::now(),
            'student_sender' => true,
            'student_id' => $student->id
        ]);

        return redirect('/reception/student')->with('success', 'Message sent');
    }

    public function destroy($id){

    }
}
