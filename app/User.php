<?php

namespace App;

use App\Builders\UserBuilder;
use App\Interfaces\AuthInterface;
use App\Models\Book;
use App\Models\Contact;
use App\Models\Post;
use App\Models\UserActivation;
use App\Models\Verified;
use App\Traits\HasUuid;
use App\Traits\OverridesBuilder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, AuthInterface,MustVerifyEmail
{
    use Notifiable;
    use HasUuid;
    use HasRoles;
    use OverridesBuilder;


    protected $guard = 'admin';

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function provideCustomBuilder()
    {
        return UserBuilder::class;
    }

    private static $whiteListFilter = ['*'];


    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function verifiedUser()
    {
        return $this->hasOne(Verified::class);
    }
    public function isAdmin(): bool
    {
        return false;
    }

    public function Posts()
    {
        return $this->hasMany(Post::class);
    }
}
