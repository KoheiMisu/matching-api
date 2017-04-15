<?php

namespace App\Application\Http\Validators\Support;

trait Validator
{
    /**
     * requestパラメータから取り出したいカラムを
     * カンマ区切りで返す.
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
}
