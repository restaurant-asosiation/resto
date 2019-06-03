<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Vacancy;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::get();

        // dd($posts);
        return view('templates.user.user_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.user.user_form');
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
            'address' => 'required',
            'sex' => 'required',
            'birth_day' => 'required',
        ]);

        $imagePath = $request->file('image')->store('user');
        $cvPath = $request->file('cv')->store('user');

        $user = new User;
        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->telephone = $request->telephone;
        $user->sex = $request->sex;
        $user->birth_day = $request->birth_day;
        $user->address = $request->address;
        $user->image = $imagePath;
        $user->cv = $cvPath;
        $saved = $user->save();
        // $with = $withHelper->withCheck($saved);
        // return redirect()->route('user.index')->with($with['withKey'], $with['withValue']);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
