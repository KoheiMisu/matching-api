<?php

namespace App\Application\Services\UseCases;

use App\Application\Services\UseCases\Support\BulkUseCaseInterface;
use Illuminate\Http\Request;

class JudgeTeamRequest implements BulkUseCaseInterface
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function executeBulk(): array
    {
        return array_only($this->request->all(), ['team_id']);
    }
}
