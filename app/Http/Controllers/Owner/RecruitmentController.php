<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Restaurant;
use App\Mylibs\WithHelper;
use App\Vacancy;

class RecruitmentController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, Vacancy $vacancy, User $user)
    {
        $data['user'] = $user;
        $data['restaurant'] = $restaurant;
        $data['vacancy'] = $vacancy;

        return view('owner.restaurant.recruitment.edit', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant, Vacancy $vacancy, User $user)
    {
        $user->nip = $request->nip;
        $saved = $user->save();

        $user->vacancy()->updateExistingPivot($vacancy, ['status'=>2]); // update status == accepted in pivot table user_vacancy

        //data check successfully saved
        $withHelper = new WithHelper;
        $with = $withHelper->withCheck($saved);
        
        return redirect()->route('owner.restaurant.vacancy.index', $restaurant)->with($with['withKey'], $with['withValue']);
    }
    
    public function reject(Restaurant $restaurant, Vacancy $vacancy, User $user)
    {
        $deleted = $user->vacancy()->updateExistingPivot($vacancy, ['status'=>3]); // update status == rejected in pivot table user_vacancy

        //data check successfully deleted
        $withHelper = new WithHelper;
        $with = $withHelper->withCheck($deleted);

        return redirect()->route('owner.restaurant.vacancy.index', $restaurant)->with($with['withKey'], $with['withValue']);

    }
}
