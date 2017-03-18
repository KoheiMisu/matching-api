<?php

namespace App\Application\Http\Validators;

use App\Application\Http\Validators\Support\ValidateLogic;

class TeamValidator implements ValidateLogic
{
    const RULES = [
        'college_id' => ['required', 'exists:colleges,id'],
        'name' => ['required', 'max:255'],
        'profile_image_path' => ['required', 'max:255'],
        'gender_ratio' => ['required'],
        'drinking_ratio' => ['required'],
    ];

    /**
     * requestパラメータから取り出したいカラムを
     * カンマ区切りで返す
     *
     * @return array
     */
    public function getValidateColumns(): array
    {
        return array_keys(self::RULES);
    }

    /**
     * @return array
     */
    public function getRules(): array
    {
        $rules = self::RULES;

        return $rules;
    }

    public function errorMessage(): string
    {
        return 'チームの保存に失敗しました。';
    }
}