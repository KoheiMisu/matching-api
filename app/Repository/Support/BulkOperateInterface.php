<?php

namespace App\Repository\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BulkOperateInterface
{
    /**
     * @param Collection $collection
     *
     * @return Model
     */
    public function find4Bulk(Collection $collection);
}
