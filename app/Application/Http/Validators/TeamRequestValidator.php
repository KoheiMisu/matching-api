<?php

namespace App\Application\Http\Validators;

use App\Application\Http\Validators\Support\ValidateLogic;
use App\Application\Http\Validators\Support\Validator;

class TeamRequestValidator implements ValidateLogic
{
    use Validator;

    const RULES = [
        'team_id' => ['required', 'exists:teams,id'],
        'user_id' => ['required', 'exists:users,id'],
    ];

    public function errorMessage(): string
    {
        return 'チーム参加申請に失敗しました。';
    }
}
