<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserPlan extends Model
{
    
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
