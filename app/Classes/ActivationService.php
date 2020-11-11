<?php


namespace App\Classes;


use App\Mail\UserActivationEmail;
use App\Models\UserActivation;
use App\User;
use Illuminate\Support\Facades\Mail;

class ActivationService
{
    protected $resendAfter = 24;
    protected $useractivation;

    public function __construct(UserActivation $userActivation)
    {
        $this->useractivation = $userActivation;
    }

    public function sendActivationEmail($user)
    {
        if ($user->activated || !$this->shouldSend($user)) {
            return;
        }
        $token = $this->useractivation->createActivation($user);
        $user->activation_link = route('user.activate', $token);
        $mailable = new userActivationEmail($user);
        Mail::to($user->email)->send($mailable);
    }

    public function activateUser($token)
    {
        $activation = $this->useractivation->getActivationByToken($token);
        if ($activation === null) {
            return null;
        }
        $user = User::find($activation->user_id);
        $user->active = true;
        $user->save();
        $this->useractivation->deleteActivation($token);
        return $user;
    }

    public function shouldSend($user)
    {
        $activation = $this->useractivation->getActivation($user);
        return $activation == null || strtotime($activation->create_at) + 60 * 60 * $this->resendAfter < time();
    }
}
