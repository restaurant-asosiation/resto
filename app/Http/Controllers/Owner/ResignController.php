<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resign;
use App\Restaurant;
use App\User;
use App\Mylibs\WithHelper;

class ResignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        //get resign berdasarkan restaurant id dan status == processed
        $resigns = Resign::where([
            ['restaurant_id', $restaurant->id],
            ['resign_status', 1]
        ])->get();

        $data['resigns'] = $resigns;
        $data['restaurant'] = $restaurant;
        
        return view('owner.restaurant.resign.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Download the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, $resign)
    {
        $resign = Resign::find($resign)->first();
        $resignPath = $resign->upload_resign;
        $fileName = $resign->date."-".$resign->user->name;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($resignPath, $fileName, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, Resign $resign)
    {
        //change resign status on resigns to rejected
        $resign->resign_status = 3;
        $saved = $resign->save();

        //HelperCheck
        $withHelper = new WithHelper;
        $with = $withHelper->withCheck($saved);

        return redirect()->route('owner.restaurant.resign.index',  $restaurant)->with($with['withKey'], $with['withValue']);
    }
}
