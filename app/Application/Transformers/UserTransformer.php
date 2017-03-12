<?php

namespace App\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        if (!$user->hasProfile()) {
            return [
                'userId' => $user->id,
                'fb_name'          => $user->fb_name,
                'profile' => null
            ];
        }

        return [
            'userId' => $user->id,
            'fbName'          => $user->fb_name,
            'hasProfile' => $user->hasProfile(),
            'profile' => [
                'name' => $user->userProfile->name,
                'college' => $user->userProfile->college->name,
                'grade' => $user->userProfile->grade
            ]
        ];
    }
}