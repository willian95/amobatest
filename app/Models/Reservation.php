<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reservation extends Model
{
    use SoftDeletes;

    public function userPlan(){
        return $this->belongsTo(UserPlan::class);
    }

    public function route(){
        return $this->belongsTo(Route::class);
    }

}
