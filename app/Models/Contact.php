<?php

namespace App\Models;

use App\Traits\HasDate;
use App\Traits\HasUuid;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Contact extends Model
{
    use  HasUuid;
    use HasDate;

    protected $table = 'contacts';
    protected $fillable = [
        'first_name', 'last_name', 'email','birthday', 'city', 'country', 'job_title', 'phone'
    ];

    protected $appends = ['age', 'fullname'];

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }

    //public $timestamps = false;

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthday)->age;
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    protected $dateFormat = 'U';

    public function users(){
        return $this->belongsTo(User::class);
    }
}
