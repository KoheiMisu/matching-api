<?php

namespace App\Application\Http\Validators;

use App\Application\Http\Validators\Support\ValidateLogic;
use App\Application\Http\Validators\Support\Validator;

class TeamUserValidator implements ValidateLogic
{
    use Validator;

    const RULES = [
        'team_id' => ['required', 'exists:teams,id'],
        'user_id' => ['required', 'exists:users,id'],
    ];

    public function errorMessage(): string
    {
        return 'チームとユーザーの紐付けに失敗しました。';
    }
}
