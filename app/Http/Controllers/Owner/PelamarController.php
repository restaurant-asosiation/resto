<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mylibs\WithHelper;
use App\Pelamar;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vacancies'] = Locker::get();
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
        // return view('owner.pelamar.list');
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

        $vacancy = new Vacancy;
        $vacancy->restaurant_id = auth()->id();
        $vacancy->name = $request->name;
        $vacancy->address = $request->address;
        $vacancy->requirement = $request->requirement;
        $vacancy->position = $request->position;
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
        // $data['vacancy'] = Vacancy::find($id);
        // return view('owner.vacancy.edit', $data);
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
        $this->validate($request, [
            
            'name' => 'required',
            'address' => 'required',
            'requirement' => 'required',
            'position' => 'required',
        ]);

        $vacancy = new Vacancy;
        $vacancy->restaurant_id = auth()->id();
        $vacancy->name = $request->name;
        $vacancy->address = $request->address;
        $vacancy->requirement = $request->requirement;
        $vacancy->position = $request->position;
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
        $pelamar = Pelamar::find($id);
        $deleted = $pelamar->delete();
        $with = $withHelper->withCheck($deleted);
        return redirect()->route('owner.pelamar.list')->with($with['withKey'], $with['withValue']);
    }
}
