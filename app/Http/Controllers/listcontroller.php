<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\users;
use App\Mylibs\WithHelper;

class indexpelamar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['pelamars'] = users::get();
        return view('owner.pelamar.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('owner.pelamar.create');
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
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'requirement' => 'required',
            'position' => 'required',

            ]);

        $pelamar = new users;
        $pelamar->restaurant_id = auth()->id();
        $pelamar->position = $request->position;
        $pelamar->address = $request->address;
        // $pelamar->salary = $request->salary;
        $pelamar->requirement = $request->requirement;
        $saved = $pelamar->save();
        $with = $withHelper->withCheck($saved);
        return redirect()->route('owner.pelamar.list')->with($with['withKey'], $with['withValue']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, WithHelper $withHelper, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'requirement' => 'required',
            'position' => 'required',

            ]);

        $pelamar = new users;
        $pelamar->restaurant_id = auth()->id();
        $pelamar->position = $request->position;
        $pelamar->address = $request->address;
        // $pelamar->salary = $request->salary;
        $pelamar->requirement = $request->requirement;
        $saved = $pelamar->save();
        $with = $withHelper->withCheck($saved);
        return redirect()->route('owner.pelamar.list')->with($with['withKey'], $with['withValue']);
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
        $pelamar = users::find($id);
        $deleted = $pelamar->delete();
        $with = $withHelper->withCheck($deleted);
        return redirect()->route('owner.pelamar.list')->with($with['withKey'], $with['withValue']);
    }
}
