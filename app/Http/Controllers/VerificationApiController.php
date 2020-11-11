<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationApiController extends Controller
{
    use VerifiesEmails;

    public function verify(Request $request)
    {
        $userID = $request['id'];
        $user = User::findOrFail($userID);
        $date=date('y-m-d g:i:s');
        $user->email_verified_at=$date;
        $user->save();
        return responder()->success('Email verrified!');
    }
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()){
            return responder()->error('User already have verified email!', 422);
            // return redirect($this->redirectPath());
        }
        $request->user()->sendEmailVerificationNOtification();
        return responder()->error();
    }
}
