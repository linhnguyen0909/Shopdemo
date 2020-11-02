<?php


namespace App\Filters;
use App\Builders\Builder;
use Illuminate\Http\Request;

abstract class Filter
{
    private $request;

    /**
     * The builder instance.
     *
     * @var Builder
     */
    protected $query;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function aplly(Builder $query)
    {
        $this->query = $query;
        foreach ($this->filters() as $method => $value) {
            if (!method_exists($this, $method)) {
                continue;
            }
            if ((is_string($value) && strlen($value)) || (is_array($value) && !empty($value))){
            $this->{$method}($value);
            }
        }
        return $this->query;
    }

    /**
     * @return mixed
     */
    public function filters(){
        return $this->request->get('filters',[]);
    }
}
