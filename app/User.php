<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles; //use spatie/laravel-permission

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Database Relation
    public function vacancy()
    {
        return $this->belongsToMany(Vacancy::class);
    }

    public function restaurant()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function resign()
    {
        return $this->hasMany(Resign::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
