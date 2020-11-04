<?php

namespace App\Policies;

use App\Enums\PermissionType;
use App\Interfaces\AuthInterface;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $auth){
        return $this->author($auth, PermissionType::VIEW_USER);
    }

    public function view(AuthInterface $auth, User $user){
        return $this->author($auth, PermissionType::VIEW_USER);
    }

    public function create(AuthInterface $auth){
        return $this->author($auth, PermissionType::CREATE_USER);
    }

    public function update(AuthInterface $auth, User $user){
        return $this->author($auth, PermissionType::UPDATE_USER);
    }

    public function delete(AuthInterface $auth, User $user){
        return $this->author($auth, PermissionType::DELETE_USER);
    }
}
