<?php

namespace App\Application\Http\Controllers\V1;

use App\Application\Services\BulkOperator;
use App\Application\Services\ModelOperator;
use App\Application\Transformers\TeamRequestTransformer;
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
        //        dd(app()->make('BulkOperator'));
        $useCase = app()->make(JudgeTeamRequest::class);
        $result  = app()->make('BulkOperator')->executeBulk($useCase);

        dd($result);

        if (!$result) {
            return $this->response->array(['data' => []]);
        }

        return $this->response->item($result, new TeamRequestTransformer());
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
