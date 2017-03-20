<?php

namespace App\Application\Http\Controllers\V1;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use App\Application\Services\JWTAuthUtility;
use App\Application\Transformers\UserProfileTransformer;
use App\Application\Services\ValidateManager;
use App\Application\Http\Validators\UserProfileValidator;
use App\Application\Services\ModelOperator;

class UserProfileController extends Controller
{
    use Helpers;

    /**
     * @param ModelOperator $modelOperator
     * @return mixed
     */
    public function store(ModelOperator $modelOperator)
    {
        $result = $modelOperator
            ->setModel(new UserProfile())
            ->validate(new UserProfileValidator())
            ->operate();

        return $this->response->array(['name' => $result->name, 'isSuccess' => true]);
    }

    /**
     * @param int $id userId
     * @param JWTAuthUtility $JWTAuthUtility
     * @return \Dingo\Api\Http\Response
     */
    public function show($id, JWTAuthUtility $JWTAuthUtility)
    {
        $user = $JWTAuthUtility->getAuthenticatedUser();

        return $this->response->item($user->userProfile, new UserProfileTransformer);
    }

    /**
     * @param $id
     * @param JWTAuthUtility $JWTAuthUtility
     * @return \Dingo\Api\Http\Response
     */
    public function edit($id, JWTAuthUtility $JWTAuthUtility)
    {
        $user = $JWTAuthUtility->getAuthenticatedUser();

        return $this->response->item($user->userProfile, new UserProfileTransformer);
    }

    /**
     * @param $id
     * @param ModelOperator $modelOperator
     * @param JWTAuthUtility $JWTAuthUtility
     * @return \Dingo\Api\Http\Response
     */
    public function update($id, ModelOperator $modelOperator, JWTAuthUtility $JWTAuthUtility)
    {
        $user = $JWTAuthUtility->getAuthenticatedUser();

        $result = $modelOperator
            ->setModel($user->userProfile)
            ->validate(new UserProfileValidator())
            ->operate();

        return $this->response->item($result, new UserProfileTransformer);
    }
}