<?php


namespace App\Builders;


class UserBuilder extends Builder
{
    public function countUser($needle = '', $format = ''){
        if ($needle) {
            $this->whereRaw(
                'FROM_UNIXTIME(unix_timestamp(`created_at`), ?) <= ?',
                [$format,  $needle]
            );
        }
        return $this->count();

    }

}
