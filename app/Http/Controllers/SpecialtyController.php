<?php

namespace App\Http\Controllers;

use App\Specialty;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialtys = Specialty::all();

        return view('specialty.specialty', ['specialtys' => $specialtys] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialty.create_specialty');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request );
        $this->validate($request, [
            'name_special'=> 'unique:specialties|required|max:255',
            'discr_special'=>'required|max:255',
            'tariff'=> 'required|max:6',
            'hourly'=> 'required'
        ]);

        $specialty = new Specialty($request->all());
        $user = Auth::user();
        $specialty->user_id=$user->id;
        $specialty->save();

        return redirect()->route('specialty.index');
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
