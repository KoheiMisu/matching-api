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
        'profile_image_path',
        'gender_ratio',
        'drinking_ratio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
