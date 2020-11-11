<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

trait PerPage
{
    public function paginateLoadMore($initialQuantily = 9, $loadMore = 3, $model = null)
    {
        abort_if(
            ($model === null && !$this instanceof Model), 404, 'this provide'
        );

        // Model is either the model passed as last argument or the Class in case it is null
        $model = $model ?: $this;

        $page = (int) Paginator::resolveCurrentPage();
        $perPage = ($page == 1) ? $initialQuantily : $loadMore;
        $skip = ($page == 1) ? 0 : ($initialQuantily + ($loadMore * ($page - 2)));

        // Get a full collection to be able to calculate the full total all the time
        $modelcollection = $model->get();

        // Get the correct results
        $modelResults = $model->skip($skip)->take($perPage)->get();

        $total = $modelcollection->count();
        $lastPage = (int) round(($total - $initialQuantily) / $loadMore + 1);

        $from = $skip + 1;
        $to = $skip + $perPage;
        $nextPageUrl = ($page !== $lastPage) ? (string) Paginator::resolveCurrentPath()
            .'?page='.($page + 1) : null;
        $previousPageUrl = ($page !== $lastPage) ? (string) Paginator::resolveCurrentPath()
            .'?page='.($page - 1) : null;

        return [
            'current_page' => $page,
            'per_page' => $perPage,
            'total' => $total,
            'last_page' => $lastPage,
            'from' => $from,
            'to' => $to,
            'previous_page_url' => $previousPageUrl,
            'next_page_url' => $nextPageUrl,
            'data' => $modelResults->toArray()
        ];
    }

    public function scopePaginateLoadMore($query, $initialQuantity = 9, $loadMore = 3, $model = null)
    {
        return $this->paginateLoadMore($initialQuantity, $loadMore, $query);
    }

}
