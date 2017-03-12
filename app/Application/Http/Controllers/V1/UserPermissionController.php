<?php

namespace App\Application\Http\Controllers\V1;

use App\Application\Http\Validators\UserPermissionValidator;
use App\Http\Controllers\Controller;
use App\Models\UserPermission;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Application\Services\ModelOperator;

class UserPermissionController extends Controller
{
    use Helpers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
            ->setModel(new UserPermission())
            ->validate(new UserPermissionValidator())
            ->save();

        return $this->response->array(['isSuccess' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function destroy($id, ModelOperator $modelOperator)
    {
//        $result = $modelOperator
//            ->setModel(new UserPermission())
//            ->validate(new UserPermissionValidator())
//            ->delete();
//
//        return $this->response->array(['isSuccess' => true]);
    }
}
