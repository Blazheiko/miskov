<?php

namespace App\Http\Controllers;

use App\ListPersonnel;
use App\Personnel;
use App\Specialty;
use App\WorkingShift;
use Illuminate\Http\Request;
use App\Http\Controllers\WorkingShiftController;

class ListPersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       // dd($idWS);

        $workingShift= WorkingShift::find($id);
        $personnels = Personnel::all();
        $specialtys = Specialty::all('id','name_special');
        $listPersonnels =array();

        foreach ($personnels as $personnel)
        {
            $listPersonnel = new ListPersonnel();
            $listPersonnel->user_id = $personnel->id;
            $listPersonnel->work_time = 0;
            $listPersonnel->specialties_id = $personnel->specialty;
            $listPersonnel->combined_time = 0;
            $listPersonnel->combined_specialties_id = $personnel->specialty;
            $listPersonnels[] =$listPersonnel;

        }

        return view('list_personnel.create_list_personnel')
            ->with(['workingShift'=>$workingShift,'personnels'=>$personnels,'specialtys'=>$specialtys]);
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
