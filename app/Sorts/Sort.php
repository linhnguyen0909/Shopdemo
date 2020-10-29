<?php


namespace App\Sorts;


use App\Builders\Builder;
use Illuminate\Http\Request;

Abstract class Sort
{
    private $request;

    protected $query;

    /**
     * Sort constructor.
     * @param  Request  $request
     */
    public function __construct(Request $request)
    {
        return $this->request=$request;
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function apply(Builder $query)
    {
        $this->query = $query;

        foreach ($this->sortBys() as $method => $value) {
            if (!method_exists($this, $method)) {
                continue;
            }
            if ((is_string($value) && strlen($value)) || (is_array($value) && !empty($value))) {
                $this->{$method}($value);
            }
        }

        return $this->query;
    }

    /**
     * @return mixed
     */
    public function sortBys()
    {
        return $this->request->get('sortBy', []);
    }
}
