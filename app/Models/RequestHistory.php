<?php
/**
 * Created by PhpStorm.
 * User: kouhei
 * Date: 2017/03/23
 * Time: 1:16.
 */

namespace App\Models;

use Reliese\Coders\Model\Model;

class RequestHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id',
        'user_id',
        'result',
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
