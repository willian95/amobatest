<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function routeDatas(){

        return $this->hasOne(RouteData::class);

    }

}
