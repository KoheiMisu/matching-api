<?php

namespace App\Repository;

use App\Repository\Support\BulkOperateInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\TeamRequest;
use Illuminate\Support\Collection;

class TeamRequestRepository extends BaseRepository implements BulkOperateInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return TeamRequest::class;
    }

    public function find4Bulk(Collection $collection)
    {
        return;
    }
}
