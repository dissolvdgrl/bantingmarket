<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Redirect;

class FormsController extends Controller
{
    public function contact(Request $request)
    {
        $regex = '/(http|ftp|https):\/\/([\w_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/';

        if(preg_match($regex, $request->input('msg_body')) || preg_match($regex, $request->input('msg_subject')))
        {
            return 'Sorry, we do not accept URLs in the message body. Please press the back button to try again.';
        }
        else
        {
            $validate = $request->validate([
                'firstname' => 'required|min:3',
                'email_address' => 'required|email',
                'msg_subject' => 'required|required|min:3',
                'msg_body' => 'required|required|min:24'
            ]);

            $data = [
                'firstname' => $request->input('firstname'),
                'email_address' => $request->input('email_address'),
                'msg_subject' => $request->input('msg_subject'),
                'msg_body' => $request->input('msg_body')
            ];

            Mail::send('mail.contact', $data, function($message) use($request)
            {
                $message->to('info@realfoodmarket.info', 'realfoodmarket.info')->subject('Message from website');
                $message->from('info@realfoodmarket.info', 'Market website');
            });

            return redirect('contact')->with('status', 'Message sent, thank you!');
        }
    }
}
