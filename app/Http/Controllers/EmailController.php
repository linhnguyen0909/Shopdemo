<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmailToUser() {
        $to_email = "nguyenhoailinh9099@gmail.com";
        $data='jabsjd';
        Mail::to($to_email)->send(new MyEmail($data));
        return 'success';

    }
}
