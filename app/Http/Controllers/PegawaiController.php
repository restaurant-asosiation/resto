<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mylibs\WithHelper;
use App\Vacancy;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vacancies'] = Vacancy::get();
        return view('owner.pegawai.index', $data);
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
            
            'NIP' => 'required',
            'name' => 'required',
            'address' => 'required',
            'position' => 'required',
            'job_description' => 'required',
            'requirement' => 'required',
            'salary' => 'required',
            
        ]);

        $vacancy = new Vacancy;
        $vacancy->restaurant_id = auth()->id();
        $vacancy->NIP = $request->NIP;
        $vacancy->name = $request->name;
        $vacancy->address = $request->address;
        $vacancy->position = $request->position;
        $vacancy->job_description = $request->job_description;
        $vacancy->requirement = $request->requirement;
        $vacancy->salary = $request->salary;
        $saved = $pegawai->save();
        $with = $withHelper->withCheck($saved);
        return redirect()->route('owner.pelamar.index')->with($with['withKey'], $with['withValue']);

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
            
            'NIP' => 'required',
            'name' => 'required',
            'address' => 'required',
            'position' => 'required',
            'job_description' => 'required',
            'requirement' => 'required',
            'salary' => 'required',
        ]);

        $vacancy = new Vacancy;
        $vacancy->restaurant_id = auth()->id();
        $vacancy->NIP = $request->NIP;
        $vacancy->name = $request->name;
        $vacancy->address = $request->address;
        $vacancy->position = $request->position;
        $vacancy->job_description = $request->job_description;
        $vacancy->requirement = $request->requirement;
        $vacancy->salary = $request->salary;
        $saved = $pegawai->save();
        $with = $withHelper->withCheck($saved);
        return redirect()->route('owner.pegawai.index')->with($with['withKey'], $with['withValue']);

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
        $vacancy = Vacancy::find($id);
        $deleted = $vacancy->delete();
        $with = $withHelper->withCheck($deleted);
        return redirect()->route('owner.pegawai.index')->with($with['withKey'], $with['withValue']);
    }
}