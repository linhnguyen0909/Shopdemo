<?php


namespace App\Builders;

use App\Filters\EloquestFilter;
use App\Filters\Filter;
use App\Sorts\Sort;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Builder as BaseBuilder;

class Builder extends BaseBuilder implements EloquestFilter
{
    /**
     * @param  Filter  $filter
     * @return Builder
     */
    public function filter(Filter $filter)
    {
        return $filter->aplly($this);
    }


    /**
     * @param  Sort  $sort
     * @return Builder
     */
    public function sortBy(Sort $sort)
    {
        return $sort->apply($this);
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

}
