<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resign;
use App\User;
use App\Mylibs\WithHelper;
use App\Restaurant;
use App\Vacancy;

class ResignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancy = Vacancy::find(2);
        //$vacancy->restaurant->city;
        return view('', ['vacancy' => $vacancy]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(auth()->id());
        $data['restaurant'] = $user->restaurant()->get()[0]; //get restaurant tempat user bekerja
        return view('user.resign.create', $data);
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
            'resign_file' => 'required|file|max:2048', //max 2,048 mb
            'reason' => 'required'
        ]);

        $user = User::find(auth()->id());
        $restaurant = $user->restaurant()->get()[0];
        $resign = new Resign;
        $resign->restaurant_id = $restaurant->id;
        $resign->user_id = auth()->id();
        if ($request->hasFile('resign_file')) { //cek file upload kosong?
            $resign->upload_resign = $request->file('resign_file')->store('storage/resign'); //store file upload
        }
        $resign->date = date('Y-m-d'); //mengambil tanggal sekarang
        $resign->reason = $request->reason;
        $saved = $resign->save();

        $withHelper = new WithHelper;
        $with = $withHelper->withCheck($saved);
        return redirect()->route('user.resign.create')->with($with['withKey'], $with['withValue']);
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
