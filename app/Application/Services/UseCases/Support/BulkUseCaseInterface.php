<?php

namespace App\Application\Services\UseCases\Support;

interface BulkUseCaseInterface
{
    /**
     * @return array
     */
    public function executeBulk(): array;
}
