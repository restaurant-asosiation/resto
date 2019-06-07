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
        // $users = User::get();

        // return view('templates.user.user_form', ['users'  => $users]);
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
    public function edit(Request $request, User $user)
    {
        $users = User::find($id);

        return view('templates.user.user_form', ['users'  => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|min:10',
            'telephone' => 'required|min:10',
            'address' => 'required',
        ], [
            'required' => ':attribute Harus Diisi'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->telephone = $request->telephone;
        $user->sex = $request->sex;
        $user->birth_day = $request->birth_day;
        $user->address = $request->address;
        $user->sex = $request->sex;

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('user');
            Storage::delete($post->image);
            $post->image = $imagePath;
        }

        if($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('user');
            Storage::delete($user->cv);
            $user->cv = $cvPath;
        }

        $user->save();
        return redirect()->route('user.index');
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
