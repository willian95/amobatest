<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteData extends Model
{
    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function calendar(){
        return $this->belongsTo(Calendar::class);
    }
}
