<?php

namespace App\Models;

use App\Models\Support\NotificationForSlack;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Notifications\Notifiable;

class Schedule extends Model
{
    use Notifiable, NotificationForSlack;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id',
        'category_id',
        'scope',
        'location',
        'memo',
        'start_time',
        'end_time',
        'last_updated_user_id',
    ];

    protected $dates = [
        'start_time',
        'end_time',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @return ScheduleCategory
     */
    public function category()
    {
        return $this->hasOne(ScheduleCategory::class, 'id', 'category_id');
    }

    /**
     * @return User
     */
    public function lastUpdateUser()
    {
        return $this->hasOne(User::class, 'id', 'last_updated_user_id');
    }

    //@Todo last_updated_user_idをmutatorで登録する
//    public function setLastUpdatedUserIdAttribute($value)
//    {
//        dd(Auth::user()->id);
//        $this->attributes['last_updated_user_id'] = Auth::user()->id;
//    }
}
