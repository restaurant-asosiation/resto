<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    public function user()
    {
        return $this->belongsToMany(Student::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
