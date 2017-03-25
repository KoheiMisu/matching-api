<?php

namespace App\Application\Http\Controllers\V1;

use App\Application\Http\Validators\TeamValidator;
use App\Models\TeamUser;
use Dingo\Api\Routing\Helpers;
use App\Models\User;
use App\Application\Services\JWTAuthUtility;
use App\Application\Services\ModelOperator;
use DB;
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

            /**
             * チーム作成者をチームと紐付ける.
             */
            $teamUser = new TeamUser();
            $teamUser->fill([
                'team_id' => $team->id,
                'user_id' => $user->id,
            ]);
            $modelOperator
                ->setModel($teamUser)
                ->operate();

            /**
             * チーム作成権限を取り消す.
             */
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
     *
     * @return \Dingo\Api\Http\Response
     */
    public function show(Team $team)
    {
        return $this->response->item($team, new TeamTransformer());
    }

    /**
     * @param Team          $team
     * @param ModelOperator $modelOperator
     *
     * @return \Dingo\Api\Http\Response
     */
    public function update(Team $team, ModelOperator $modelOperator)
    {
        $updatedTeam = $modelOperator
            ->setModel($team)
            ->validate(new TeamValidator())
            ->operate();

        return $this->response->item($updatedTeam, new TeamTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
