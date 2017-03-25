<?php

namespace App\Application\Http\Controllers\V1;

use App\Application\Services\ModelOperator;
use App\Models\TeamRequest;
use App\Application\Http\Validators\TeamRequestValidator;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

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
     * @param TeamRequest   $teamRequest
     * @param ModelOperator $modelOperator
     *
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, ModelOperator $modelOperator)
    {
        dd($request->teamRequest);
        //return $this->response->item($updatedTeamRequest, new TeamRequestTransformer);
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
