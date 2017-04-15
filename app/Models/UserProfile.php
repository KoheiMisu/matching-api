<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Support\NotificationForSlack;

class UserProfile extends Model
{
    use Notifiable, NotificationForSlack;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'college_id',
        'name',
        'grade',
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

    /**
     * @return bool
     */
    public function isFreshman(): bool
    {
        if ($this->grade === 1) {
            return true;
        }

        return false;
    }
}
