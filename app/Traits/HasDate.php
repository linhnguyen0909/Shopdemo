<?php


namespace App\Traits;


use Illuminate\Support\Carbon;

trait HasDate
{
    public function getCreatedAtAttribute()
    {

        return date('D-d/M/Y', $this->attributes['created_at']);
    }

    public function getUpdatedAtAttribute()
    {
        return date('d-m-Y', $this->attributes['updated_at']);
    }

    public function setCreatedAtAttribute()
    {
        $this->attributes['created_at'] = Carbon::now()->timestamp;
    }
    public function setUpdatedAtAttribute()
    {
        $this->attributes['updated_at'] = Carbon::now()->timestamp;
    }
}
