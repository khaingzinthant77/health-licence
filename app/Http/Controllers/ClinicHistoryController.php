<?php

namespace App\Http\Controllers;

use App\Models\ClinicHistory;
use App\Models\Clinic;
use App\Models\Township;
use Illuminate\Http\Request;

class ClinicHistoryController extends Controller
{
    function __construct()
    {
         // $this->middleware('permission:clinichistory-list', ['only' => ['index']]);
    }

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
                                    ->leftJoin('users','users.id','=','clinic_histories.login_id')
                                        ->select(
                                            'clinic_histories.id',
                                            'clinics.clinic_name',
                                            'licence_types.lic_name',
                                            'sub_licence_types.sub_lic_name',
                                            'sub_licence_types.sub_lic_short',
                                            'clinic_histories.lic_no',
                                            'townships.tsh_name_mm',
                                            'clinic_histories.duration',
                                            'clinic_histories.issue_date',
                                            'clinic_histories.expire_date',
                                            'clinic_histories.created_at',
                                            'users.name'
                                        );
                                        
        if ($request->name != '') {
            $histories = $histories->where('clinics.clinic_name','like','%'.$request->name.'%')->orwhere('clinic_histories.lic_no','like','%'.$request->name.'%');
        }
        if ($request->tsh_id) {
            $histories = $histories->where('townships.id',$request->tsh_id);
        }
        // $check_valid = $request->check_valid;
        // if($check_valid=='1'){ // licence valid
        //   $histories = $histories->WhereRaw('(DATEDIFF( clinic_histories.expire_date,  NOW())>60)');
        //   }

        //   // for  licence will expire
        //   if($check_valid=='2'){
        //       $histories = $histories->WhereRaw('(DATEDIFF(clinic_histories.expire_date, NOW())<60) AND (DATEDIFF( clinic_histories.expire_date,  NOW())>0)');
        //   }

        //   //for licence expired
        //   if($check_valid=='3'){ 
        //       $histories = $histories->WhereRaw('(DATEDIFF( clinic_histories.expire_date, NOW())<0)');
        //   }

        
        if (auth()->user()->tsh_id != null) {
          $histories = $histories->where('clinic_histories.tsh_id',auth()->user()->tsh_id);
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

    public function extend_licence(Request $request)
    {
        // dd($request->all());
        // dd(date('Y-m-d', strtotime($request->issue_date)));
        $rules = [
            'issue_date'=>'required',
            'duration'=>'required',
            'expire_date'=>'required',
        ];

         $this->validate($request,$rules);

        // dd($request->all());
        $licence_extend = ClinicHistory::create([
            'clinic_id'=>$request->clinic_id,
            'lic_id'=>$request->lic_id,
            'sub_lic_id'=>$request->sub_lic_id,
            'tsh_id'=>$request->tsh_id,
            'lic_no'=>$request->lic_no,
            'issue_date'=>date('Y-m-d', strtotime($request->issue_date)),
            'duration'=>$request->duration,
            'expire_date'=>date('Y-m-d', strtotime($request->expire_date)),
            'login_id'=>$request->login_id
        ]);

        $clinics = Clinic::find($request->clinic_id)->update([
            'expire_date'=>date('Y-m-d', strtotime($request->expire_date))
        ]);
        return redirect()->route('clinic.index')->with('success','Success');
    }
}
