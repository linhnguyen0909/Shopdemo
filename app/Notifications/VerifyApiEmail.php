<?php


namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class VerifyApiEmail extends VerifyEmailBase
{
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verificationapi.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable]
        );
    }
    public function sendApiEmailVerificationNotification(){
        $this->notify(new VerifyApiEmail());
    }
}
