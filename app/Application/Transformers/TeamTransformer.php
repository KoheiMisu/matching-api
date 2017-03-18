<?php

namespace App\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Team;

class TeamTransformer extends TransformerAbstract
{

    /**
     * @param Team $team
     * @return array
     */
    public function transform(Team $team)
    {
        return [
        ];
    }
}