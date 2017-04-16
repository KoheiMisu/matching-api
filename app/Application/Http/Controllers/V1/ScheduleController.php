<?php

namespace App\Application\Http\Controllers\V1;

use App\Application\Http\Validators\ScheduleValidator;
use App\Repository\ScheduleRepository;
use Dingo\Api\Routing\Helpers;
use App\Application\Services\JWTAuthUtility;
use App\Application\Services\ModelOperator;
use App\Models\Schedule;
use App\Application\Transformers\ScheduleTransformer;
use Illuminate\Support\Collection;

class ScheduleController extends Controller
{
    use Helpers;

    /**
     * ユーザが登録されているチームの予定を全て表示.
     *
     * @param JWTAuthUtility $JWTAuthUtility
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JWTAuthUtility $JWTAuthUtility)
    {
        $schedules = app(ScheduleRepository::class)->findByUserBelongsToTeam($JWTAuthUtility->getUserBelongsToTeamIds());

        return $this->response->collection($schedules, new ScheduleTransformer());
    }

    /**
     * @ToDo チームが存在しない場合は、スケジュールが登録できないようにバリデーション
     *
     * @param JWTAuthUtility $JWTAuthUtility
     * @param ModelOperator  $modelOperator
     *
     * @return mixed
     */
    public function store(JWTAuthUtility $JWTAuthUtility, ModelOperator $modelOperator)
    {
        $modelOperator
            ->setModel(new Schedule())
            ->validate(new ScheduleValidator())
            ->operate();

        return $this->response->array(['isSuccess' => true]);
    }

    /**
     * @param Schedule $schedule
     *
     * @return \Dingo\Api\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return $this->response->item($schedule, new ScheduleTransformer());
    }

    /**
     * @param Schedule      $schedule
     * @param ModelOperator $modelOperator
     *
     * @return \Dingo\Api\Http\Response
     */
    public function update(Schedule $schedule, ModelOperator $modelOperator)
    {
        $updatedSchedule = $modelOperator
            ->setModel($schedule)
            ->validate(new ScheduleValidator())
            ->operate();

        return $this->response->item($updatedSchedule, new ScheduleTransformer());
    }

    /**
     * @param Schedule      $schedule
     * @param ModelOperator $modelOperator
     *
     * @return mixed
     */
    public function destroy(Schedule $schedule, ModelOperator $modelOperator)
    {
        $modelOperator
            ->setModel($schedule)
            ->operate();

        return $this->response->array(['isSuccess' => true]);
    }
}
