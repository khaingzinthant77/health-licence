<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:doctor-list|doctor-create|doctor-show|doctor-edit|doctor-deiete', ['only' => ['index','show','approve',]]);
         $this->middleware('permission:doctor-create', ['only' => ['create','store','approve']]);
         $this->middleware('permission:doctor-edit', ['only' => ['edit','update','approve']]);
         $this->middleware('permission:doctor-delete', ['only' => ['destroy']]);
         $this->middleware('permission:doctor-show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $doctors = Doctor::all();
        // return view('admin.doctor.index');
        $doctors = new Doctor();

        if ($request->name != '') {
            $doctors = $doctors->where('doc_name','like','%'.$request->name.'%')->orwhere('doc_degree','like','%'.$request->name.'%')->orwhere('doc_phone','like','%'.$request->name.'%');
        }

        $count = $doctors->count();
        $doctors = $doctors->orderBy('created_at','asc')->paginate(10);

        return view('admin.doctor.index',compact('doctors','count'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinics = Clinic::all();
        $tsh_clinics = Clinic::where('tsh_id',auth()->user()->tsh_id)->get();
        return view('admin.doctor.create',compact('clinics','tsh_clinics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'clinic_id'=>'required',
            'doc_name'=>'required',
            'doc_degree'=>'required',
            'doc_phone'=>'required',
            'doc_address'=>'required',
        ];

         $this->validate($request,$rules);

         $doctor = Doctor::create([
            'clinic_id'=> $request->clinic_id,
            'doc_name'=> $request->doc_name,
            'doc_degree' => $request->doc_degree,
            'doc_phone' => $request->doc_phone,
            'doc_address' => $request->doc_address
         ]);

         return redirect()->route('doctor.index')->with('success','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        // dd($doctor);
        return view('admin.doctor.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinics = Clinic::all();
        $tsh_clinics = Clinic::where('tsh_id',auth()->user()->tsh_id)->get();

        $doctor = Doctor::find($id);
        return view('admin.doctor.edit',compact('doctor','clinics','tsh_clinics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'clinic_id'=>'required',
            'doc_name'=>'required',
            'doc_degree'=>'required',
            'doc_phone'=>'required',
            'doc_address'=>'required',
        ];

         $this->validate($request,$rules);
         $doctor = Doctor::find($id);
         $doctor = $doctor->update([
            'clinic_id'=> $request->clinic_id,
            'doc_name'=> $request->doc_name,
            'doc_degree' => $request->doc_degree,
            'doc_phone' => $request->doc_phone,
            'doc_address' => $request->doc_address
         ]);
         return redirect()->route('doctor.index')->with('success','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findorfail($id)->delete();
        return redirect()->route('doctor.index')->with('success','Success');
    }
}
