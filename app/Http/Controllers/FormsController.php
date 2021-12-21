<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Redirect;
use App\Rules\ValidCaptcha;

class FormsController extends Controller
{
    public function contactForm(Request $request)
    {

        $request->validate([
            'firstname' => 'required|min:3',
            'email_address' => 'required|email',
            'msg_subject' => 'required|min:3',
            'msg_body' => 'required|min:24',
            'h-captcha-response' => ['required', new ValidCaptcha]
        ],
        [
            'h-captcha-response.required' => "Please make sure you have selected the I am human box."
        ]
        );

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

        return redirect('contact')->with('status', 'Thanks for your message, we\'ll get back to you in no time!');
    }

    public function apply(Request $request)
    {
        $email = $request->get('email');

        $this->validate(request(), [
            'stall_name' => 'required|min:3',
            'name_surname' => 'required',
            'car_reg' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => [
                    'required', 'not_regex:
                    /(http|ftp|https):\/\/([\w_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/'
                ],
            'produce_self' => 'required|in:Yes,No',
            'products.*' => 'required',
            'stand_type' => 'required',
            'social_media' => 'required|in:Yes,No'
        ]);

        $data = [
            'stall_name' => $request->input('stall_name'),
            'name_surname' => $request->input('name_surname'),
            'car_reg' => $request->input('car_reg'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'website' => $request->input('website'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'produce_self' => $request->input('produce_self'),
            'products' => $request->input('products'),
            'stand_type' => $request->input('stand_type'),
            'appliances' => $request->input('appliances'),
            'use_gas' => $request->input('use_gas'),
            'social_media' => $request->input('social_media')
        ];

        Mail::send('mail.application', $data, function($message) use($request) {
            $message->to('c@chilldsgn.com', "Christie")->subject('Vendor Application');
        });

        Mail::send('mail.application_client', $data, function($message) use($request) {
            $message->to($request->input('email'), $request->input('name_surname'))->subject('Banting Market Application');
        });

        return ['message', 'Thank you for your submission. We will review it and get back to you as soon as possible'];
    }
}
