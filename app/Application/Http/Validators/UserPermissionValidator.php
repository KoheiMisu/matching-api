<?php

namespace App\Application\Http\Validators;

use App\Application\Http\Validators\Support\ValidateLogic;

class UserPermissionValidator implements ValidateLogic
{
    const RULES = [
        'user_id' => ['required', 'exists:users,id'],
        'team_id' => ['sometimes', 'exists:teams,id'],
        'type' => ['required', 'in:captain,team,schedule'],
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
        return '権限の保存に失敗しました。';
    }
}