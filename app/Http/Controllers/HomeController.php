<?php

namespace App\Http\Controllers;

use App\Events\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        event(new SendMail('cfc36e29-ead9-39c1-9402-6c018f0c920a'));
        return responder()->success();
    }
}
