<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function contact(){
        return view('frontend.contact');
    }

    public function dataSender(Request $request)
    {
        Mail::send('frontend.email', [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            

        ], function($mail) use($request){
            $mail->to(config('email.usernam'), $request->name);
            $mail->to("katwalarjun652@gmail.com");
        });
        return redirect()->back();
    }
}
