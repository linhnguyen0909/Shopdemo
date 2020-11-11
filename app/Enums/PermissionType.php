<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PermissionType extends Enum
{
    public const VIEW_BOOK = 'view-book';
    public const CREATE_BOOK = 'create-book';
    public const UPDATE_BOOK = 'update-book';
    public const DELETE_BOOK = 'delete-book';

    public const VIEW_POST = 'view-post';
    public const CREATE_POST = 'create-post';
    public const UPDATE_POST = 'update-post';
    public const DELETE_POST = 'delete-post';

    public const VIEW_USER = 'view-user';
    public const CREATE_USER = 'create-user';
    public const UPDATE_USER = 'update-user';
    public const DELETE_USER = 'delete-user';
}
