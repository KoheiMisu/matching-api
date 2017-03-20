<?php

namespace App\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Schedule;

class ScheduleTransformer extends TransformerAbstract
{

    /**
     * @param Schedule $schedule
     * @return array
     */
    public function transform(Schedule $schedule)
    {
        return [

        ];
    }
}