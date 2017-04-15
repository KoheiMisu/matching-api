<?php

namespace App\Application\Services\Transeformer\Support;

use Illuminate\Support\Collection;

interface BulkRequestInterface
{
    /**
     * @return Collection
     */
    public function translateRequest4Bulk();
}
