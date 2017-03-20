<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Support\NotificationForSlack;

class Team extends Model
{
    use Notifiable, NotificationForSlack;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'college_id',
        'name',
        'practice_location',
        'profile_image_path',
        'people',
        'practice_day_of_week',
        'gender_ratio', // 男女比
        'drinking_ratio', // 飲み会の頻度
        'seriousness', //サッカー / フットサルの真剣度
        'memo',
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
