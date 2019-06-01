<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mylibs\WithHelper;
use App\Vacancy;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vacancies'] = Vacancy::get();
        return view('owner.vacancy.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.vacancy.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, WithHelper $withHelper)
    {
        $this->validate($request, [
            'position' => 'required',
            'job_desc' => 'required',
            'salary' => 'required',
            'requirement' => 'required',
        ]);

        $vacancy = new Vacancy;
        $vacancy->restaurant_id = 1;
        $vacancy->position = $request->position;
        $vacancy->job_desc = $request->job_desc;
        $vacancy->salary = $request->salary;
        $vacancy->requirement = $request->requirement;
        $saved = $vacancy->save();
        $with = $withHelper->withCheck($saved);
        return redirect()->route('owner.vacancy.index')->with($with['withKey'], $with['withValue']);

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
        $data['vacancy'] = Vacancy::find($id);
        return view('owner.vacancy.edit', $data);
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
        $this->validate($request, [
            'position' => 'required',
            'job_desc' => 'required',
            'salary' => 'required',
            'requirement' => 'required',
        ]);

        $vacancy = Vacancy::find($id);
        $vacancy->position = $request->position;
        $vacancy->job_desc = $request->job_desc;
        $vacancy->salary = $request->salary;
        $vacancy->requirement = $request->requirement;
        $saved = $vacancy->save();
        $with = $withHelper->withCheck($saved);
        return redirect()->route('owner.vacancy.index')->with($with['withKey'], $with['withValue']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithHelper $withHelper, $id)
    {
        $vacancy = Vacancy::find($id);
        $deleted = $vacancy->delete();
        $with = $withHelper->withCheck($deleted);
        return redirect()->route('owner.vacancy.index')->with($with['withKey'], $with['withValue']);
    }
}
