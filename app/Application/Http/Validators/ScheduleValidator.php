<?php

namespace App\Application\Http\Validators;

use App\Application\Http\Validators\Support\ValidateLogic;
use App\Application\Http\Validators\Support\Validator;

class ScheduleValidator implements ValidateLogic
{
    use Validator;

    const RULES = [
        'team_id'              => ['required', 'exists:teams,id'],
        'category_id'          => ['required', 'exists:schedule_categories,id'],
        'location'             => ['required', 'max:255'],
        'scope'                => ['required', 'in:open,closed'],
        'memo'                 => ['max:255'],
        'start_time'           => ['required', 'date_format:"Y-m-d H:i:s"'],
        'end_time'             => ['required', 'date_format:"Y-m-d H:i:s"', 'after:start_time'],
        'last_updated_user_id' => ['required', 'exists:users,id'],
    ];

    public function errorMessage(): string
    {
        return 'スケジュールの保存に失敗しました。';
    }
}
