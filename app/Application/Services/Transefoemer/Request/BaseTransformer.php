<?php

namespace App\Application\Services\Transeformer\Request;

use Illuminate\Http\Request;

class BaseTransformer
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
