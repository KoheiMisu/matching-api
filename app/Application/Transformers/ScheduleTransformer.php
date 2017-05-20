<?php

namespace App\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Schedule;

class ScheduleTransformer extends TransformerAbstract
{
    /**
     * @param Schedule $schedule
     *
     * @return array
     */
    public function transform(Schedule $schedule)
    {
        return [
            'scheduleId' => $schedule->id,
            'categoryName' => $schedule->category->category_name,
            'scope'      => $schedule->scope,
            'location'   => $schedule->location,
            'memo'       => $schedule->memo,
            'startTime' => $schedule->start_time->format('Y/m/d h:i'),
            'endTime'   => $schedule->end_time->format('Y/m/d h:i'),
        ];
    }
}
