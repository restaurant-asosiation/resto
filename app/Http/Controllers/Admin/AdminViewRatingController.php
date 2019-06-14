<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rating;

class AdminViewRatingController extends Controller
{
    public function showRating(Restaurant $restaurant, User $user)
    {
        $data['ratings'] = Rating::get();
        // $data['user'] = $user;

        return view('admin.rating.index', $data);
    }

    public function editRating(Restaurant $restaurant, User $user)
    {
        $data['restaurant'] = $restaurant;
        $data['user'] = $user;

        return view('admin.rating.edit', $data);
    }
}

