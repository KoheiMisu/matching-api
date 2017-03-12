<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\College;

class UserProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'college_id',
        'name',
        'grade'
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
     * @return boolean
     */
    public function isFreshman(): bool
    {
        if ($this->grade === 1) {
            return true;
        }

        return false;
    }
}
