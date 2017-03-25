<?php

namespace App\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Team;

class TeamRequestTransformer extends TransformerAbstract
{
    /**
     * @param Re $team
     *
     * @return array
     */
    public function transform(Team $team)
    {
        return [
            'name'                 => $team->name,
            'profile_image_path'   => $team->profile_image_path,
            'practice_location'    => $team->practice_location,
            'practice_day_of_week' => $team->practice_day_of_week,
            'memo'                 => $team->memo,
            'people'               => $team->people,
            'gender_ratio'         => $team->gender_ratio,
            'drinking_ratio'       => $team->drinking_ratio,
            'seriousness'          => $team->seriousness,
            'college'              => [
                'name' => $team->college->name,
            ],
        ];
    }
}
