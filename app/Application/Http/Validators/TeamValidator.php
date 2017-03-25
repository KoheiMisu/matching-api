<?php

namespace App\Application\Http\Validators;

use App\Application\Http\Validators\Support\ValidateLogic;
use App\Application\Http\Validators\Support\Validator;

class TeamValidator implements ValidateLogic
{
    use Validator;

    const RULES = [
        'college_id'           => ['required', 'exists:colleges,id'],
        'name'                 => ['required', 'max:255'],
        'practice_location'    => ['required', 'max:255'],
        'practice_day_of_week' => ['required', 'max:255'],
        'people'               => ['required', 'integer'],
        'profile_image_path'   => ['required', 'max:255'],
        'gender_ratio'         => ['required', 'max:3'],
        'drinking_ratio'       => ['required', 'max:3'],
        'seriousness'          => ['required', 'max:3'],
    ];

    public function errorMessage(): string
    {
        return 'チームの保存に失敗しました。';
    }
}
