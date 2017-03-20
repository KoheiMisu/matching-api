<?php

namespace App\Application\Http\Validators;

use App\Application\Http\Validators\Support\ValidateLogic;
use App\Application\Http\Validators\Support\Validator;

class UserProfileValidator implements ValidateLogic
{
    use Validator;

    const RULES = [
        'user_id' => ['required', 'exists:users,id'],
        'college_id' => ['required', 'exists:colleges,id'],
        'name' => ['required', 'max:255'],
        'grade' => ['required', 'in:1,2,3,4']
    ];

    public function errorMessage(): string
    {
        return 'プロフィールの保存に失敗しました。';
    }
}