<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function locker()
    {
        return $this->hasMany(Locker::class);
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
