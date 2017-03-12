<?php

namespace App\Application\Http\Validators;

use App\Application\Http\Validators\Support\ValidateLogic;

class UserProfileValidator implements ValidateLogic
{
    const RULES = [
        'user_id' => ['required', 'exists:users,id'],
        'college_id' => ['required', 'exists:colleges,id'],
        'name' => ['required', 'max:255'],
        'grade' => ['required', 'in:1,2,3,4']
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
        return 'プロフィールの保存に失敗しました。';
    }
}