<?php

namespace App\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\UserProfile;

class UserProfileTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array.
     *
     * @param UserProfile $userProfile
     *
     * @return array
     */
    public function transform(UserProfile $userProfile)
    {
        return [
            'name'    => $userProfile->name,
            'college' => $userProfile->college->name,
            'grade'      => $userProfile->grade,
            'isFreshman' => $userProfile->isFreshman(),
        ];
    }
}
