<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Vacancy;
use App\User;
use App\Restaurant;
// use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\User\Storage;

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
        return view('templates.user.user_index', ['vacancies'  => $vacancies]);
        // return view('templates.user.user_index', ['vacancies'  => $vacancies, 'restaurant' => $restaurant]);
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
        // dd($id);
        // dd($vacancy);
        $vacancy = Vacancy::find($id);
        return view('templates.user.user_jobdetail', ['vacancy' => $vacancy]);
        // return view('templates.user.user_index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = User::find($id);
        // dd(auth()->user()->email);
        return view('templates.user.user_form', ['user'  => $user]);
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
        $this->validate($request, [
            'name' => 'required|min:10',
            'telephone' => 'required|min:10',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv' => 'required|file|max:1024'
        ], [
            'required' => ':attribute Harus Diisi'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->telephone = $request->telephone;
        $user->address = $request->address;
        $user->sex = $request->sex;
        $user->birth_day = $request->birth_day;

        if($request->hasFile('image')) {
            Storage::delete($user->image);
            $imagePath = $request->file('image')->store('storage\user\fotoprofil');
            $user->image = $imagePath;
        }

        if($request->hasFile('cv')) {
            Storage::delete($user->cv);
            $cvPath = $request->file('cv')->store('storage\user\cv');
            $user->cv = $cvPath;
        }

        // dd();

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
