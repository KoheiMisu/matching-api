<?php

namespace App\Application\Http\Controllers\V1;

use App\Application\Http\Validators\ScheduleValidator;
use Dingo\Api\Routing\Helpers;
use App\Models\User;
use App\Application\Services\JWTAuthUtility;
use App\Application\Services\ModelOperator;
use DB;
use Log;
use App\Models\Schedule;
use App\Application\Transformers\ScheduleTransformer;

class ScheduleController extends Controller
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

        return $this->response->array(['isSuccess' => true]);
    }

    /**
     * @param Schedule $schedule
     * @return \Dingo\Api\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return $this->response->item($schedule, new ScheduleTransformer);
    }


    /**
     * @param Schedule $schedule
     * @param ModelOperator $modelOperator
     * @return \Dingo\Api\Http\Response
     */
    public function update(Schedule $schedule, ModelOperator $modelOperator)
    {
        $updatedSchedule = $modelOperator
            ->setModel($schedule)
            ->validate(new ScheduleValidator())
            ->operate();

        return $this->response->item($updatedSchedule, new ScheduleTransformer);
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
