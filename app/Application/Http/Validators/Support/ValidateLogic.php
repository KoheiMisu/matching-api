<?php

namespace App\Application\Http\Validators\Support;

interface ValidateLogic
{
    /**
     * @return array
     */
    public function getValidateColumns(): array;

    /**
     * @return array
     */
    public function getRules(): array;

    /**
     * @return string
     */
    public function errorMessage(): string;
}