<?php

namespace App\Http\Controllers;

use App\ListPersonnel;
use App\ListProduct;
use App\ListProductShift;
use App\ListStorage;
use App\ListStoragesShift;
use App\Personnel;
use App\Product;
use App\Specialty;
use App\Storage;
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
        $workingShifts = WorkingShift::select( ['date','time_start','time_end','created_at','updated_at'])
            ->orderBy('date','desc')->get();

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
        $products =Product::all();
        $storages = Storage::all();
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

        $listStoragesShifts = [];
        foreach ($storages as $storage)
        {
            $listStoragesShift = new ListStoragesShift();
            $listStoragesShift->quantity = 0;
            $listStoragesShift->name = $storage->name ;
            $listStoragesShift->storage_id = $storage->id ;
            $listStoragesShifts[] = $listStoragesShift;
        }
        Session::put('listStoragesShifts', $listStoragesShifts);

        return view('working_shift.create_working_shift')
            ->with(['listPersonnels'=>$listPersonnels,'specialtys'=>$specialtys,
                    'listStorages'=>$listStoragesShifts,'products'=>$products]);
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
        //Добавляем табель в смену
        $listPersonnels = Session::pull('listPersonnels', null);
        $user = Auth::user();
        $workingShift = new WorkingShift ($request->all());
        $workingShift->user_id = $user->id;
        for ($i = 0; $i < count($listPersonnels); $i++ )
        {
            $listPersonnels[$i]->work_time      = $request->work_time[$i];
            $listPersonnels[$i]->specialties_id = $request->specialties_id[$i];
            $listPersonnels[$i]->combined_time  = $request->combined_time [$i];
            $listPersonnels[$i]->combined_specialties_id  = $request->combined_specialties_id [$i];
        }
        $workingShift->list_personnel = $listPersonnels;

        //Добавляем список произведенной продукции в смену 'products_id','quantity','storage'

        $listStoragesShifts = Session::pull('listStoragesShifts', null);
        $listProductShift = new ListProductShift();
        $listProductShift->products_id = $request->product;
        for ($i = 0; $i < count($listStoragesShifts); $i++ )
        {
            $listStoragesShifts[$i]->quantity = $request->quantity[$i];
        }
        $listProductShift->listStorages = $listStoragesShifts;
        $workingShift->list_product = $listProductShift;

        $workingShift->save();

        return redirect()->route('workingShift.index' );
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
