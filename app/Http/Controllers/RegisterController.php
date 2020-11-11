<?php

namespace App\Http\Controllers;


use App\Classes\ActivationService;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\UserActivationEmail;
use App\Models\Verified;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';
    protected $activationService;

    public function __construct(ActivationService $activationService)
    {
        $this->middleware['guest'];
        $this->activationService = $activationService;
    }

    protected function create(UserRegisterRequest $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $verifyUser = Verified::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);
        Mail::to($user->email)->send(new UserActivationEmail($user));
        return $user;

    }

    public function verifyUser($token)
    {

        $verifyUser = Verified::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->user;
        }
        if (!$user->verified) {
            $verifyUser->user->verified = 1;
            $verifyUser->user->save();
        } else {
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status',
            'We sent you an activation code. Check your email and click on the link to verify.');
    }
    //protected function register(UserRegisterRequest $request){
//    $user=$this->create($request->all());
//    event(new Registered($user));
//    //$this->guard()->login($user);
//
//    $this->activationService->sendActivationMail($user);
//
//    return 'Bạn hãy kiểm tra email và thực hiện xác thực theo hướng dẫn.';
//}
}
