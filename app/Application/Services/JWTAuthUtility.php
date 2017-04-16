<?php

namespace App\Application\Services;

use App\Models\User;
use JWTAuth;

class JWTAuthUtility
{
    /** @var User */
    private $user;

    public function __construct()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        $this->user = $user;
    }

    public function getAuthenticatedUser()
    {
        return $this->user;
    }

    public function getUserBelongsToTeamIds()
    {
        return $this->user->getBelongsToTeamId();
    }
}
