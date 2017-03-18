<?php

namespace App\Models;

use App\Models\Support\NotificationForSlack;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Team;
use Illuminate\Notifications\Notifiable;

class UserPermission extends Model
{
    use SoftDeletes, Notifiable, NotificationForSlack;

    const CAPTAIN = 'captain';
    const TEAM = 'team';
    const SCHEDULE = 'schedule';

    const TYPES = [
        self::CAPTAIN,
        self::TEAM,
        self::SCHEDULE,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_id',
        'type'
    ];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * @param $value
     * @return null
     */
    public function setTeamIdAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        $this->attributes['team_id'] = $value;
    }

    /**
     * @param string $permissionType
     * @return string
     */
    public static function getGatePermissionByType(string $permissionType): string
    {
        $gate = 'can:' . $permissionType;

        return $gate;
    }

    /**
     * @return array
     */
    public static function getAllGatePermission(): array
    {
        $gates = [];
        foreach (self::TYPES as $type) {
            $gates[] = 'can:' . $type;
        }

        return $gates;
    }


}
