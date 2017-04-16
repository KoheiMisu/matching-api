<?php

namespace App\Repository;

use App\Repository\Support\BulkOperateInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Schedule;
use Illuminate\Support\Collection;

class ScheduleRepository extends BaseRepository implements BulkOperateInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Schedule::class;
    }

    public function find4Bulk(Collection $collection)
    {
        return $this->findWhereIn('id', $collection->all());
    }

    public function findBulkResult(array $data)
    {
        return $this->findWhere(['team_id' => $data['team_id']]);
    }

    /**
     * ユーザが属しているチームのスケジュールを全て返す.
     *
     * @param Collection $collection
     *
     * @return mixed
     */
    public function findByUserBelongsToTeam(Collection $collection)
    {
        return $this->findWhereIn('team_id', $collection->all());
    }
}
