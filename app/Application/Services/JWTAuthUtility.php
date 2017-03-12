<?php

namespace App\Application\Services;

use JWTAuth;

class JWTAuthUtility
{
    public function getAuthenticatedUser()
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        return $user;
    }
}