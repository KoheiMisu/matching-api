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

    public function setTeamIdAttribute($value)
    {
        if (strlen($value) === 0) {
            return null;
        }

        return $value;
    }
}
