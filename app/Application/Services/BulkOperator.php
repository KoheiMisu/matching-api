<?php

namespace App\Application\Services;

use App\Repository\Support\BulkOperateInterface;

class BulkOperator
{
    /**
     * @var BulkOperateInterface
     */
    private $repository;

    public function setRepository(BulkOperateInterface $repository)
    {
        $this->repository = $repository;

        return $this;
    }

    public function fetchModels()
    {
        $models = $this->repository->find4Bulk();

        if (count($models->toArray()) === 0) {
            abort(404, 'target entity not found');
        }

        return $models;
    }
}
