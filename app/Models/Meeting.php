<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'meetingName',
        'meetingTime',
        'meetingPlace',
        'userID',
    ];
   

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

}
