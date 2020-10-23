<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class FrontController extends Controller
{
    public function addFeedback(Request $request)
    {
        $input = $request->all();
        Mail::send('mailfb', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['comment']), function($message){
            $message->to(' ĐIỀN EMAIL CỦA BẠN MUỐN NHẬN MAIL VÀO ĐÂY', 'Visitor')->subject('Visitor Feedback!');
        });
        Session::flash('flash_message', 'Send message successfully!');

        return view('form');
    }
}
