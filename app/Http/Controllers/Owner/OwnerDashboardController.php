<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Mylibs\WithHelper;
use Illuminate\Support\Str;
use App\User;

class OwnerDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['restaurants'] = User::find(auth()->id())->restaurant()->get();
        return view('owner.dashboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'telephone' => 'required',
            'description' => 'required',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->slug = Str::slug($request->name);
        $restaurant->telephone = $request->telephone;
        $restaurant->description = $request->description;
        $restaurant->province = $request->province;
        $restaurant->city = $request->city;
        $restaurant->address = $request->address;
        if ($request->hasFile('logo')) {
            $restaurant->logo = $request->file('logo')->store('storage');;
        }
        $saved = $restaurant->save();
        
        $user = User::find(auth()->id());
        $user->restaurant()->attach($restaurant->id);

        $withHelper = new WithHelper;
        $with = $withHelper->withCheck($saved);
        return redirect()->route('owner.dashboard.index')->with($with['withKey'], $with['withValue']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('owner.restaurant.dashboard.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy($id)
    {
        //
    }
}
