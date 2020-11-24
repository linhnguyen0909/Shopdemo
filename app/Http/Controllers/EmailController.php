<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function sendEmail(Request $request)
    {
        config(['mail.mailers.smtp.username'=> $request->email,
            'mail.mailers.smtp.password'=>$request->password]);

        $to_email = $request->to_email;
        Mail::to($to_email)->send(new MyEmail(['contact' => $request->contact]));
        return 'success';
    }
}
