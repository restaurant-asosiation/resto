<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relations
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
