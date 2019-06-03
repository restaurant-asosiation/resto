<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mylibs\WithHelper;
use App\Vacancy;
use App\Restaurant;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $data['restaurant'] = $restaurant;
        $data['vacancies'] = Vacancy::get();
        // dd($data);
        return view('owner.restaurant.vacancy.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        $data['restaurant'] = $restaurant;
        return view('owner.restaurant.vacancy.create', $data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Restaurant $restaurant)
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
        $withHelper = new WithHelper;
        $with = $withHelper->withCheck($saved);

        return redirect()->route('owner.restaurant.vacancy.index', $restaurant)->with($with['withKey'], $with['withValue']);

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
    public function edit(Restaurant $restaurant, Vacancy $vacancy)
    {
        $data['vacancy'] = $vacancy;
        $data['restaurant'] = $restaurant;
        return view('owner.restaurant.vacancy.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithHelper $withHelper, Restaurant $restaurant, Vacancy $vacancy)
    {
        $this->validate($request, [
            'position' => 'required',
            'job_desc' => 'required',
            'salary' => 'required',
            'requirement' => 'required',
        ]);

        $vacancy->position = $request->position;
        $vacancy->job_desc = $request->job_desc;
        $vacancy->salary = $request->salary;
        $vacancy->requirement = $request->requirement;
        $saved = $vacancy->save();
        $with = $withHelper->withCheck($saved);

        return redirect()->route('owner.restaurant.vacancy.index', $restaurant)->with($with['withKey'], $with['withValue']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithHelper $withHelper, Restaurant $restaurant, $id)
    {
        $vacancy = Vacancy::find($id);
        $deleted = $vacancy->delete();
        $with = $withHelper->withCheck($deleted);

        return redirect()->route('owner.restaurant.vacancy.index', $restaurant)->with($with['withKey'], $with['withValue']);
    }
}
