<?php

namespace App\Traits;

trait PaginatedTrait
{
    public function scopePaginated($query, $pageLimit = null)
    {
        if(!$pageLimit){
            return $query->paginate($this->pageLimit);
        }
        return $query->paginate($pageLimit);
    }
}