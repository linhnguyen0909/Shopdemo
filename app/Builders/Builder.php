<?php


namespace App\Builders;


<<<<<<< HEAD
class Builder
{

=======
use App\Filters\EloquestFilter;
use App\Filters\Filter;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Builder as BaseBuilder;

class Builder extends BaseBuilder implements EloquestFilter
{
    public function filter(Filter $filter)
    {
        return $filter->aplly($this);
    }

    /**
     * @param $column
     * @param  null  $value
     * @return $this
     */
    public function whereLike($column, $value = null)
    {
        $this->where($column, 'like', '%'.$value.'%');
        return $this;
    }
>>>>>>> feature/#06_like_search_user
}
