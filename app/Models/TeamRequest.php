<?php
/**
 * Created by PhpStorm.
 * User: kouhei
 * Date: 2017/03/23
 * Time: 1:10.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates = [
        'created_at',
    ];
}
