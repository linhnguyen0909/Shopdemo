<?php


namespace App\Sorts;


use App\Traits\CommonSort;
use Illuminate\Http\Request;

class UserSort extends Sort
{
    use CommonSort;

    public function name($direction){
        return $this->query->orderBy('name', $direction);
    }
    public function email($direction){
        return $this->query->orderBy('email', $direction);
    }
}
