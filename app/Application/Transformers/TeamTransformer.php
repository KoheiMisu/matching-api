<?php

namespace App\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Team;

class TeamTransformer extends TransformerAbstract
{
    /**
     * @param Team $team
     *
     * @return array
     */
    public function transform(Team $team)
    {
        return [
            'name'                 => $team->name,
            'profileImagePath'   => $team->profile_image_path,
            'practiceLocation'    => $team->practice_location,
            'practiceDayOfWeek' => $team->practice_day_of_week,
            'memo'                 => $team->memo,
            'people'               => $team->people,
            'genderRatio'         => $team->gender_ratio,
            'drinkingRatio'       => $team->drinking_ratio,
            'seriousness'          => $team->seriousness,
            'college'              => $team->college->name,
        ];
    }
}
