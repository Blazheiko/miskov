<?php

namespace App\Http\Controllers;

use App\ListPersonnel;
use App\Personnel;
use App\Specialty;
use App\WorkingShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WorkingShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workingShifts = WorkingShift::all();

        return view('working_shift.working_shift', ['workingShifts' => $workingShifts] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnels = Personnel::all();
        $specialtys = Specialty::all('id','name_special');
        $listPersonnels =array();

        foreach ($personnels as $personnel)
        {
            $listPersonnel = new ListPersonnel();
            $listPersonnel->user_id = $personnel->id;
            $listPersonnel->full_name = $personnel->last_name.' '.$personnel->name.' '.$personnel->patronymic.' '.$personnel->birth_date;
            $listPersonnel->work_time = 0;
            $listPersonnel->specialties_id = $personnel->specialty;
            $listPersonnel->combined_time = 0;
            $listPersonnel->combined_specialties_id = $personnel->specialty;
            $listPersonnels[] = $listPersonnel;

        }
        Session::put('listPersonnels', $listPersonnels);

        return view('working_shift.create_working_shift')
            ->with(['listPersonnels'=>$listPersonnels,'specialtys'=>$specialtys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $listPersonnels = Session::pull('listPersonnels', null);
        $user = Auth::user();
        $workingShift =new WorkingShift ($request->all());
        $workingShift->user_id=$user->id;
        for ($i = 0;$i < count($listPersonnels); $i++ )
        {
            $listPersonnels[$i]->work_time = work_time[i];


        }

        $workingShift->save();


        return redirect()->route('listPersonnel.create',[$workingShift]);
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
