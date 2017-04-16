<?php

namespace App\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Schedule;

class ScheduleTransformer extends TransformerAbstract
{
    /**
     * @param Schedule $schedules
     *
     * @return array
     */
    public function transform(Schedule $schedule)
    {
        return [
            'category' => [
                'name' => $schedule->category->category_name,
            ],
            'scope'      => $schedule->scope,
            'location'   => $schedule->location,
            'memo'       => $schedule->memo,
            'start_time' => $schedule->start_time->toDateTimeString(),
            'end_time'   => $schedule->end_time->toDateTimeString(),
        ];
    }
}
