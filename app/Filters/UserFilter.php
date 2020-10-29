<?php


namespace App\Filters;


use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;


class UserFilter extends Filter
{
    /**
     * @param $name
     * @return \App\Builders\Builder
     */
    public function name($name)
    {
        return $this->query->whereLike('name', $name);
    }

    public function titleBook($title){
        return $this->query->whereHas('books',function ($query)use ($title){
            $query->select('title')->whereLike('title',$title);
        });
    }
    /**
     * @param $age
     * @return \App\Builders\Builder|\Illuminate\Database\Eloquent\Builder
     */
//    public function age($age)
//    {
//        return $this->query->whereHas('contacts', function ($query) use ($age) {
//            $data = Carbon::parse($query->birthday)->age;
//            dd($data);
//            $query->whereYear($data, '>', $age);
//        });
//    }
}
