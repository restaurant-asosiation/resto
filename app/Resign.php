<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resign extends Model
{
protected $table = "resign"

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
