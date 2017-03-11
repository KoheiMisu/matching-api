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
        return [
            'fb_name'          => $user->fb_name,
            'has_profile' => $user->hasProfile()
        ];
    }
}