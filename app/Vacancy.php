<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    //add slug fun
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relasi
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
