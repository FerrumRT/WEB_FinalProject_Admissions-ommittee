<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\Chat;
use App\EducationDegree;
use App\Message;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function show($id)
    {
        $student = null;
        $admission_member = null;
        if (Auth::user()->admission_member_id!=null)
            $admission_member = AdmissionMember::find(Auth::user()->admission_member_id);
        else if(Auth::user()->student_id!=null)
            $student = Student::find(Auth::user()->student_id);


        $edu_deg = EducationDegree::all();
        $chats = Chat::find($id);
        $messages = Message::where('chat_id', $id)->get();
        return view("pages/online_reception/chat")
            ->with('title', "Online reception")
            ->with("student", $student)
            ->with("admission_member", $admission_member)
            ->with("edu_deg", $edu_deg)
            ->with("chats", $chats)
            ->with("messages", $messages);
    }

    public function answer($ad_id, $id)
    {
        $message = Message::find($id);
        $admission_member = AdmissionMember::find($ad_id);

        $chat = DB::table('chats')
            ->where('admission_member_id', $admission_member->id)
            ->where('student_id', $message->student_id)
            ->first();

        if (empty($chat)) {
            $chat = Chat::create([
                'latest_message_text' => $message->message_text,
                'latest_message_time' => $message->send_date,
                'created_date' => Carbon::now(),
                'student_id' => $message->student_id,
                'admission_member_id' => $admission_member->id,
            ]);
        }else{
            DB::table('chats')->where('id', $chat->id)->update([
                'latest_message_text'=> $message->message_text,
                'latest_message_time'=> $message->send_date,
                'latest_message_sender'=> true,
            ]);

        }
        $message->read_by_receiver = true;
        $message->chat_id = $chat->id;
        $message->admission_member_id = $admission_member->id;
        $message->save();
        return redirect('/reception/'.$chat->id);
    }

    public function send_student(Request $request, $u_id, $id)
    {
        $this->validate($request, [
            'message_text' => 'required',
        ]);

        $student = Student::find($u_id);
        $chat = Chat::find($id);

        $message = Message::create([
            'message_text' => $request['message_text'],
            'read_by_receiver' => true,
            'send_date' => Carbon::now(),
            'student_sender' => true,
            'student_id' => $student->id,
            'admission_member_id' =>$chat->admission_member_id,
            'chat_id' => $id
        ]);

        DB::table('chats')->where('id', $chat->id)->update([
            'latest_message_text'=> $request['message_text'],
            'latest_message_time'=> $message->send_date,
            'latest_message_sender'=> true,
        ]);

        return redirect('/reception/'.$id);
    }

    public function send_admission(Request $request,  $u_id, $id)
    {
        $this->validate($request, [
            'message_text' => 'required',
        ]);

        $admission_member = AdmissionMember::find($u_id);
        $chat = Chat::find($id);

        $message = Message::create([
            'message_text' => $request['message_text'],
            'read_by_receiver' => true,
            'send_date' => Carbon::now(),
            'student_sender' => false,
            'admission_member_id' => $admission_member->id,
            'student_id' =>$chat->student_id,
            'chat_id' => $id
        ]);

        DB::table('chats')->where('id', $chat->id)->update([
            'latest_message_text'=> $request['message_text'],
            'latest_message_time'=> $message->send_date,
            'latest_message_sender'=> false,
        ]);

        return redirect('/reception/'.$id);
    }


}
