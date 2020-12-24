<?php

namespace App\Http\Controllers;

use App\Mail\DemoEmail;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MailController extends Controller
{
    public $message;
    /**
     * @param string $email
     */
    public $email;

    public function basic_email(Request $request) {
        $this->validate($request, [
            'email' => 'required | email',
            'message' => 'required',
        ]);

        $this->message = $request->message;
        $this->email = $request->email;

        $data = array('email'=>$request->email, 'messages' => $request->message);

        Mail::send(['text'=>'pages.emails.welcome', 'message'=>$request->message], $data, function($message) {
            $message->to('nbveh211001@gmail.com', 'Tutorials Point')->subject
            ('Message from '.strval($this->email));
        });
        return Redirect::action("PageController@contacts");
    }
    public function html_email(Request $request) {

        $this->validate($request, [
            'email' => 'required | email',
            'message' => 'required',
        ]);

        $this->message = $request->message;
        $this->email = $request->email;

        $data = array('email'=>$request->email, 'messages' => $request->message);

        Mail::send(['text'=>'pages.emails.welcome', 'message'=>$request->message], $data, function($message) {
            $message->to('nbveh211001@gmail.com', 'Tutorials Point')->subject
            ('Message from '.strval($this->email));
        });
        return Redirect::action("PageController@contacts");
    }
    public function attachment_email(Request $request) {
        $this->validate($request, [
            'email' => 'required | email',
            'message' => 'required',
        ]);

        $this->message = $request->message;
        $this->email = $request->email;

        $data = array('email'=>$request->email, 'messages' => $request->message);

        Mail::send(['text'=>'pages.emails.welcome', 'message'=>$request->message], $data, function($message) {
            $message->to('nbveh211001@gmail.com', 'Tutorials Point')->subject
            ('Message from '.strval($this->email));
        });
        return Redirect::action("PageController@contacts");
    }
}
