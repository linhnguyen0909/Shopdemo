<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected $fillable ='user_activations';
    protected $guarded=[];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
//    protected function getToken(){
//        return hash_hmac('sha256',str_random(40),config('app.key'));
//    }
//    public function createActivation($user){
//        $activation=$this->getActivation($user);
//        if (!$activation){
//            return $this->createToken($user);
//        }
//        return $this->regenerateToken($user);
//    }
//    private function regenerateToken($user){
//        $token=$this->getToken();
//        UserActivation::where('user_id',$user->id)->update([
//            'token'=>$token,
//            'create_at'=>new Carbon()
//        ]);
//        return $token;
//    }
//    private function createToken($user){
//        $token=$this->getToken();
//        UserActivation::insert([
//            'user_id'=>$user->id,
//            'token'=>$token,
//            'create_at'=> new Carbon()
//        ]);
//        return $token;
//    }
//    public function getActivation($user){
//        return UserActivation::where('user_id',$user->id)->fist();
//    }
//    public function getActivationByToken($token){
//        return UserActivation::where('token',$token)->fist();
//    }
//    public function deleteActivation($token){
//        UserActivation::where('token',$token)->delete();
//    }
}