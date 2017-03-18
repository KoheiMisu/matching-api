<?php

namespace App\Application\Http\Controllers\V1;

use App\Application\Http\Validators\TeamValidator;
use App\Application\Http\Validators\UserPermissionValidator;
use App\Models\UserPermission;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Application\Services\JWTAuthUtility;
use App\Application\Services\ModelOperator;
use DB;
use Log;
use App\Models\Team;
use App\Application\Transformers\TeamTransformer;

class TeamController extends Controller
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

    public function store(JWTAuthUtility $JWTAuthUtility, ModelOperator $modelOperator)
    {
        /** @var User $user */
        $user = $JWTAuthUtility->getAuthenticatedUser();

        DB::transaction(function () use ($user, $modelOperator) {
            $team = $modelOperator
                        ->setModel(new Team())
                        ->validate(new TeamValidator())
                        ->operate();

            $userPermission = $user->getUserPermissionByTeam();
            $userPermission->fill(['team_id' => $team->id]);
            $modelOperator
                ->setModel($userPermission)
                ->operate();
        });

        return $this->response->array(['isSuccess' => true]);
    }

    /**
     * @param Team $team
     * @return \Dingo\Api\Http\Response
     */
    public function show(Team $team)
    {
        dd($team);
        return $this->response->item($team, new TeamTransformer);
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
