<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Mylibs\WithHelper;

class AdminRegisterController extends Controller
{
    public function showForm()
    {
        //get all role
        $roles = Role::get();
        $data['roles'] = $roles;

        return view('admin.register.register', $data);
    }

    public function create(Request $request)
    {
        // validate
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        //Store user
        $user = User::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role); //add role to user

        $withHelper = new WithHelper;
        $with = $withHelper->withCheck($user);

        return redirect()->route('admin.register.showForm')->with($with['withKey'], $with['withValue']);
    }
}
