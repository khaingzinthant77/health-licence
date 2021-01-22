<?php

namespace App\Http\Controllers;

use App\Models\ClinicHistory;
use App\Models\Township;
use Illuminate\Http\Request;

class ClinicHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $townships = Township::all();
        $histories = new ClinicHistory();

        
        $histories = $histories->leftJoin('clinics','clinics.id','=','clinic_histories.clinic_id')
                                    ->leftJoin('licence_types','licence_types.id','=','clinic_histories.lic_id')
                                    ->leftJoin('sub_licence_types','sub_licence_types.id','=','clinic_histories.sub_lic_id')
                                    ->leftJoin('townships','townships.id','=','clinic_histories.tsh_id')
                                        ->select(
                                            'clinic_histories.id',
                                            'clinics.clinic_name',
                                            'licence_types.lic_name',
                                            'sub_licence_types.sub_lic_name',
                                            'sub_licence_types.sub_lic_short',
                                            'clinic_histories.lic_no',
                                            'townships.tsh_name_mm',
                                            'clinic_histories.duration'
                                        );
        if ($request->name != '') {
            $histories = $histories->where('clinics.clinic_name','like','%'.$request->name.'%')->orwhere('clinic_histories.lic_no','like','%'.$request->name.'%');
        }
        if ($request->tsh_id) {
            $histories = $histories->where('townships.id',$request->tsh_id);
        }
           
        $count = $histories->count();
        $histories = $histories->orderBy('clinic_histories.created_at','asc')->paginate(10);

        return view('admin.clinic_history.index',compact('histories','count','townships'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\ClinicHistory  $clinicHistory
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicHistory $clinicHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClinicHistory  $clinicHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicHistory $clinicHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClinicHistory  $clinicHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClinicHistory $clinicHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClinicHistory  $clinicHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicHistory $clinicHistory)
    {
        //
    }
}
