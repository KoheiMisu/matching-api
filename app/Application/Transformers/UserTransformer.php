<?php

namespace App\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array.
     *
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        $this->injectPermission($user);

        if (!$user->hasProfile()) {
            return [
                'userId'  => $user->id,
                'fbName' => $user->fb_name,
                'profile' => null,
                'hasProfile' => $user->hasProfile(),
            ];
        }

        return [
            'userId'     => $user->id,
            'fbName'     => $user->fb_name,
            'hasProfile' => $user->hasProfile(),
            'profileName'    => $user->userProfile->name,
            'college' => $user->userProfile->college->name,
            'grade' => $user->userProfile->grade,
        ];
    }

    private function injectPermission(User $user)
    {
        $team = [];

        foreach ($user->userPermission as $permission) {

        }

        return $team;
    }
}
