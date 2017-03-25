<?php

namespace App\Application\Http\Controllers\V1;

use App\Application\Services\ModelOperator;
use App\Models\TeamRequest;
use App\Application\Http\Validators\TeamRequestValidator;
use Dingo\Api\Routing\Helpers;
use App\Application\Services\UseCases\JudgeTeamRequest;

class TeamRequestController extends Controller
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

    /**
     * @param ModelOperator $modelOperator
     *
     * @return mixed
     */
    public function store(ModelOperator $modelOperator)
    {
        $modelOperator
            ->setModel(new TeamRequest())
            ->validate(new TeamRequestValidator())
            ->operate();

        return $this->response->array(['isSuccess' => true]);
    }

    /**
     * @return \Dingo\Api\Http\Response
     */
    public function update()
    {
        $useCase = app()->make(JudgeTeamRequest::class);
        $result  = app()->make('BulkOperator')->executeBulk($useCase);

        if (!$result) {
            return $this->response->array(['data' => []]);
        }

        $response = [];

        foreach ($result as $item) {
            /*
             * @Todo user_profile入力をシステムで必須にした場合
             *       $item->user->userProfile->nameにする
             */
            $response['data'][] = [
                'user' => [
                    'name' => $item->user->fb_name,
                ],
            ];
        }

        return response()->json($response);
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
