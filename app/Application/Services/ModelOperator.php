<?php

namespace App\Application\Services;

use App\Application\Http\Validators\Support\ValidateLogic;
use App\Application\Services\ValidateManager;
use Illuminate\Database\Eloquent\Model;
use Dingo\Api\Exception\ResourceException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;
use Illuminate\Database\QueryException;
use App\Notifications\SlackPosted;

class ModelOperator
{
    /** @var ValidateManager  */
    private $validateManager;

    /** @var Model */
    private $model;

    /** @var  array */
    private $params;

    /**
     * ModelOperator constructor.
     * @param \App\Application\Services\ValidateManager $validateManager
     */
    public function __construct(ValidateManager $validateManager)
    {
        $this->validateManager = $validateManager;
    }

    /**
     * @param ValidateLogic $validateLogic
     * @return $this
     */
    public function validate(ValidateLogic $validateLogic)
    {
        $this->params = $this->validateManager->validate($validateLogic);

        return $this;
    }

    /**
     * @param Model $model
     * @return $this
     */
    public function setModel(Model $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return Model
     */
    public function save()
    {
        try {
            $this->model->fill($this->params);
            $this->model->save();
        } catch (QueryException $e) {
            $attachment = $this->createAttachmentOfQueryException($e);
            $this->model->notify(new SlackPosted(true, $attachment));
            throw new ResourceException('resource operate was failed', ['isSuccess' => false]);
        }

        return $this->model;
    }

    /**
     * @param QueryException $e
     * @return \Illuminate\Support\Collection
     */
    private function createAttachmentOfQueryException(QueryException $e)
    {
        $attachment = collect([]);

        $attachment
            ->put('message', $e->getMessage());

        return $attachment;
    }
}