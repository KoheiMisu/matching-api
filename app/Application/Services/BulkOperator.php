<?php

namespace App\Application\Services;

use App\Application\Services\Transeformer\Support\BulkRequestInterface;
use App\Repository\Support\BulkOperateInterface;
use App\Application\Services\UseCases\Support\BulkUseCaseInterface;
use Illuminate\Database\Eloquent\Model;

class BulkOperator
{
    /**
     * @var BulkOperateInterface
     */
    private $repository;

    /**
     * @var BulkRequestInterface
     */
    private $transformer;

    public function __construct(
        BulkOperateInterface $repository,
        BulkRequestInterface $transformer
    ) {
        $this->repository  = $repository;
        $this->transformer = $transformer;
    }

    public function setRepository(BulkOperateInterface $repository)
    {
        $this->repository = $repository;

        return $this;
    }

    public function setTransformer(BulkRequestInterface $transformer)
    {
        $this->transformer = $transformer;

        return $this;
    }

    /**
     * @return Model
     */
    public function bindModels()
    {
        $translatedRequest = $this->transformer->translateRequest4Bulk();

        $models = $this->repository->find4Bulk($translatedRequest);

        if (count($models->toArray()) === 0) {
            abort(404, 'target entity not found');
        }

        return $models;
    }

    /**
     * @param BulkUseCaseInterface $useCase
     *
     * @return Model
     */
    public function executeBulk(BulkUseCaseInterface $useCase)
    {
        $data = $useCase->executeBulk();

        return $this->repository->findBulkResult($data);
    }
}
