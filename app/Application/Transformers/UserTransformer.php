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
            'id' => $user->id,
            'fb_name'          => $user->fb_name,
            'hasProfile' => $user->hasProfile()
        ];
    }
}