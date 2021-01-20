<?php

namespace App\Http\Controllers;

use App\Models\ClinicHistory;
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
        $histories = new ClinicHistory();

        if ($request->name != '') {
            $histories = $histories->where('clinic_name','like','%'.$request->name.'%')->orwhere('owner','like','%'.$request->name.'%');
        }

        $count = $histories->count();
        $histories = $histories->orderBy('created_at','asc')->paginate(10);

        return view('admin.clinic_history.index',compact('histories','count'))->with('i', (request()->input('page', 1) - 1) * 10);
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
