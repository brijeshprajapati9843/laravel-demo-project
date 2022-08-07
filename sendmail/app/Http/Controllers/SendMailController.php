<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SendMailController extends Controller
{
    public function sendMail(Request $request)
    {
        $name = $request->post('name');
        $this->email = $request->post('email');
        $contact = $request->post('contact');
        $subject = $request->post('subject');
        $user_message = $request->post('message');

        Mail::send('mail.send_mail_layout', ['name'=>$name, 'email'=>$this->email, 'contact'=>$contact, 'subject'=>$subject, 'user_message'=>$user_message], function($message) {
            $message->to($this->email);
            $message->from("clubmalwa12@gmail.com");
            $message->subject('New Contact Form Enquiry');
        });
        return back()->with('success','Email Send Successfully !!');
    }
}
