<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Interfaces\AuthInterface;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    public function before(AuthInterface $user)
    {
        return $user->hasRole(UserType::SUPER_ADMIN);
    }

    public function author(AuthInterface $user, string $permission)
    {
        return $user->hasPermissionTo($permission);
    }
}
