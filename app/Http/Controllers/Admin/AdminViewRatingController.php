<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rating;
use App\Restaurant;
use Illuminate\Foundation\Auth\User;

class AdminViewRatingController extends Controller
{
    public function showRating()
    {
        $data['ratings'] = Rating::get();
        // $data['user'] = $user;

        return view('admin.rating.index', $data);
    }

    public function editRating()
    {
        // $data['restaurant'] = $restaurant;
        // $data['user'] = $user;

        // return view('admin.rating.edit', $data);
    }
}

