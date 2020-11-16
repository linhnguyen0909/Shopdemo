<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\Mail\MyEmail;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        $user=User::find($event->user_id)->toArray();
//        Mail::send('emails.success',$user,function ($message)use ($user){
//            $message->to($user['email']);
//            $message->subject('Event Testing');
//        });
        $to_email = $user['email'];
        Mail::to($to_email)->send(new MyEmail(['contact' => 'hello']));
        return 'success';
    }
}
