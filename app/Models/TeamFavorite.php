<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 21 Mar 2017 23:30:22 +0900.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TeamFavorite.
 *
 * @property int $id
 * @property int $user_id
 * @property int $team_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class TeamFavorite extends Eloquent
{
    protected $casts = [
        'user_id' => 'int',
        'team_id' => 'int',
    ];

    protected $fillable = [
        'user_id',
        'team_id',
    ];
}
