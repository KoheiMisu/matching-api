<?php

namespace App\Application\Http\Controllers\V1;

use App\Models\UserProfile;
use Dingo\Api\Routing\Helpers;
use App\Application\Services\JWTAuthUtility;
use App\Application\Transformers\UserProfileTransformer;
use App\Application\Http\Validators\UserProfileValidator;
use App\Application\Services\ModelOperator;

/**
 * Class UserProfileController
 * @package App\Application\Http\Controllers\V1
 */
class UserProfileController extends Controller
{
    use Helpers;

    /**
     * @SWG\Post(
     *     path="/user_profiles/",
     *     description="user_profileを取得",
     *     produces={"application/json"},
     *     tags={"user_profiles"},
     *     @SWG\Parameter(
     *         name="user_profiles_id",
     *         description="user_profilesのID",
     *         in="path",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Success"
     *     ),
     *     @SWG\Response(
     *         response=404,
     *         description="Parameter error"
     *     ),
     *     @SWG\Response(
     *         response=403,
     *         description="Auth error",
     *     ),
     * )
     *
     * @param ModelOperator $modelOperator
     *
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
     * @SWG\Get(
     *     path="/user_profiles/{user_profiles_id}",
     *     description="user_profileを取得",
     *     produces={"application/json"},
     *     tags={"user_profiles"},
     *     @SWG\Parameter(
     *         name="user_profiles_id",
     *         description="user_profilesのID",
     *         in="path",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Success"
     *     ),
     *     @SWG\Response(
     *         response=404,
     *         description="Parameter error"
     *     ),
     *     @SWG\Response(
     *         response=403,
     *         description="Auth error",
     *     ),
     * )
     *
     * @param int            $id             userId
     * @param JWTAuthUtility $JWTAuthUtility
     *
     * @return \Dingo\Api\Http\Response
     */
    public function show($id, JWTAuthUtility $JWTAuthUtility)
    {
        $user = $JWTAuthUtility->getAuthenticatedUser();

        return $this->response->item($user->userProfile, new UserProfileTransformer());
    }

    /**
     * @param $id
     * @param JWTAuthUtility $JWTAuthUtility
     *
     * @return \Dingo\Api\Http\Response
     */
    public function edit($id, JWTAuthUtility $JWTAuthUtility)
    {
        $user = $JWTAuthUtility->getAuthenticatedUser();

        return $this->response->item($user->userProfile, new UserProfileTransformer());
    }

    /**
     * @param $id
     * @param ModelOperator  $modelOperator
     * @param JWTAuthUtility $JWTAuthUtility
     *
     * @return \Dingo\Api\Http\Response
     */
    public function update($id, ModelOperator $modelOperator, JWTAuthUtility $JWTAuthUtility)
    {
        $user = $JWTAuthUtility->getAuthenticatedUser();

        $result = $modelOperator
            ->setModel($user->userProfile)
            ->validate(new UserProfileValidator())
            ->operate();

        return $this->response->item($result, new UserProfileTransformer());
    }
}
