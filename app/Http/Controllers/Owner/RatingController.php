<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\User;
use App\Rating;
use App\Mylibs\WithHelper;
use App\Resign;

class RatingController extends Controller
{
    public function createRating(Restaurant $restaurant, User $user)
    {
        $data['restaurant'] = $restaurant;
        $data['user'] = $user;

        return view('owner.restaurant.rating.create', $data);
    }

    public function storeRating(Request $request, Restaurant $restaurant, User $user)
    {
        $this->validate($request, [
            'rate' => 'required',
            'comment' => 'required'
        ]);

        
        //save rating
        $rating = new Rating;
        $rating->user_id = $user->id;
        $rating->restaurant_id = $restaurant->id;
        $rating->rating = $request->rate;
        $rating->comment = $request->comment;
        $saved = $rating->save();            

        //add delete employee from restaurant employee list

        // change resign_status to accepted
        $resign = Resign::where([
            ['restaurant_id', $restaurant->id],
            ['user_id', $user->id]
        ])->get();
        $resign->resign_status = 2;
        $resign->save();

        //delete employee from restaurant employee list
        $restaurant->user()->detach($user->id);

        //helper Check
        $withHelper = new WithHelper;
        $with = $withHelper->withCheck($saved);

        return redirect()->route('owner.restaurant.resign', $restaurant)->with($with['withKey'], $with['withValue']);
    }
}
