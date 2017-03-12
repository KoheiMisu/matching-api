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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @return College
     */
    public function college()
    {
        return $this->hasOne(College::class, 'id', 'college_id');
    }
}
