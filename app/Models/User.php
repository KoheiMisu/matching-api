<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserProfile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fb_name',
        'fb_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @return UserProfile
     */
    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * @return boolean
     */
    public function hasProfile(): bool
    {
        if ($this->userProfile) {
            return true;
        }

        return false;
    }
}
