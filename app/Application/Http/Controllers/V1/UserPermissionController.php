<?php

namespace App\Application\Http\Controllers\V1;

use App\Application\Http\Validators\UserPermissionValidator;
use App\Models\UserPermission;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Application\Services\ModelOperator;

class UserPermissionController extends Controller
{
    use Helpers;

    /**
     * @param ModelOperator $modelOperator
     * @return mixed
     */
    public function store(ModelOperator $modelOperator)
    {
        $result = $modelOperator
            ->setModel(new UserPermission())
            ->validate(new UserPermissionValidator())
            ->operate();

        return $this->response->array(['isSuccess' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(UserPermission $userPermission, ModelOperator $modelOperator)
    {
        $result = $modelOperator
            ->setModel($userPermission)
            ->operate();

        return $this->response->array(['isSuccess' => true]);
    }
}
