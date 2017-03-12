<?php

namespace App\Application\Services;

use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Http\Request;
use Illuminate\Validation\Factory;
use App\Application\Http\Validators\Support\ValidateLogic;

class ValidateManager
{
    /** @var Factory  */
    private $validator;

    /** @var  Request */
    private $request;

    /** @var  string */
    private $httpMethod;

    public function __construct(Factory $validatorFactory, Request $request)
    {
        $this->validator = $validatorFactory;
        $this->request = $request;
        $this->httpMethod = head($this->request->route()->getMethods());
    }


    public function validate(ValidateLogic $validateLogic)
    {
        $payload = $this->request->only($validateLogic->getValidateColumns());

        $validator = $this->validator->make($payload, $validateLogic->getRules());

        if ($validator->fails()) {
            throw new StoreResourceFailedException($validateLogic->errorMessage(), $validator->errors());
        }

        return $payload;
    }

    public function getHttpMethod()
    {
        return $this->httpMethod;
    }
}