<?php

namespace App\Application\Services\Transeformer\Request;

use App\Application\Services\Transeformer\Support\BulkRequestInterface;
use Illuminate\Support\Collection;

class TeamRequestTransformer extends BaseTransformer implements BulkRequestInterface
{
    /**
     * @return Collection
     */
    public function translateRequest4Bulk()
    {
        $data = collect($this->request->get('data'));

        return $data->pluck('request_id');
    }
}
