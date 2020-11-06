<?php


namespace App\Policies;


use App\Enums\PermissionType;
use App\Models\Admin;
use App\Policies\BasePolicy;
use App\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        return $this->author($user, PermissionType::VIEW_ADMIN);
    }

    public function view(AuthInterface $user, Admin $admin){
        return $this->author($user, PermissionType::VIEW_ADMIN);
    }

    public function create(AuthInterface $user){
        return $this->author($user, PermissionType::CREATE_ADMIN);
    }

    public function update(AuthInterface $user, Admin $admin){
        return $this->author($user, PermissionType::UPDATE_ADMIN);
    }

    public function delete(AuthInterface $user, Admin $admin){
        return $this->author($user, PermissionType::DELETE_ADMIN);
    }
}
