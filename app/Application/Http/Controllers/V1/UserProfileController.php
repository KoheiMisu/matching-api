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
use App\Application\Services\ModelOperator;

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
     * @param ModelOperator $modelOperator
     * @return mixed
     */
    public function store(ModelOperator $modelOperator)
    {
        $result = $modelOperator
            ->setModel(new UserProfile())
            ->validate(new UserProfileValidator())
            ->save();

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

    public function update(ModelOperator $modelOperator, JWTAuthUtility $JWTAuthUtility)
    {
        $user = $JWTAuthUtility->getAuthenticatedUser();

        $result = $modelOperator
            ->setModel($user->userProfile)
            ->validate(new UserProfileValidator())
            ->save();

        return $this->response->item($result, new UserProfileTransformer);
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
