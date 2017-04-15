<?php

namespace App\Application\Http\Validators;

use App\Application\Http\Validators\Support\ValidateLogic;
use App\Application\Http\Validators\Support\Validator;

class UserPermissionValidator implements ValidateLogic
{
    use Validator;

    const RULES = [
        'user_id' => ['required', 'exists:users,id'],
        'team_id' => ['sometimes', 'exists:teams,id'],
        'type'    => ['required', 'in:captain,team,schedule'],
    ];

    public function errorMessage(): string
    {
        return '権限の保存に失敗しました。';
    }
}
