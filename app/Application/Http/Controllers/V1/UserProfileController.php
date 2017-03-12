<?php

namespace App\Application\Http\Controllers\V1;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use App\Application\Services\JWTAuthUtility;
use App\Application\Transformers\UserProfileTransformer;
use App\Application\Services\ValidateManager;
use App\Application\Http\Validators\UserProfileValidator;

class UserProfileController extends Controller
{
    use Helpers;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param ValidateManager $validateManager
     * @return \Dingo\Api\Http\Response
     */
    public function store(ValidateManager $validateManager)
    {
        $data = $validateManager->validate(new UserProfileValidator());

        $userProfile = new UserProfile($data);

        try {
            $userProfile->save();
        } catch (\Exception $e) {
            return $this->response->array(['isSuccess' => false])->setStatusCode(500);
        }

        return $this->response->array(['name' => $userProfile->name, 'isSuccess' => true]);
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

    public function update(ValidateManager $validateManager, JWTAuthUtility $JWTAuthUtility)
    {
        $user = $JWTAuthUtility->getAuthenticatedUser();

        $data = $validateManager->validate(new UserProfileValidator());

        $userProfile = $user->userProfile;

        try {
            $userProfile->fill($data);
            $userProfile->save();
        } catch (\Exception $e) {
            return $this->response->array(['isSuccess' => false])->setStatusCode(500);
        }

        return $this->response->item($userProfile, new UserProfileTransformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
