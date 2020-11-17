<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\MyEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
//        $to_email = $request->to_email;
//        Mail::to($to_email)->send(new MyEmail(['contact' => $request->contact]));
//        return 'success';
        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(3));
        dispatch($emailJob);

        echo 'email sent';
    }
}
