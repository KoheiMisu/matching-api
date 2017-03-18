<?php

namespace App\Application\Http\Controllers\V1;

use Illuminate\Http\Request;
use JWTAuth;
use Illuminate\Http\JsonResponse;
use Dingo\Api\Routing\Helpers;
use App\Application\Transformers\UserTransformer;
use App\Application\Services\JWTAuthUtility;

class UserController extends Controller
{
    use Helpers;

    /**
     * @param JWTAuthUtility $JWTAuthUtility
     * @return \Dingo\Api\Http\Response|JsonResponse
     */
    public function getAuthenticatedUser(JWTAuthUtility $JWTAuthUtility)
    {
        $user = $JWTAuthUtility->getAuthenticatedUser();

        // the token is valid and we have found the user via the sub claim
        return $this->response->item($user, new UserTransformer);
    }
}
