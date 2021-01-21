<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Clinic_Photo;
use App\Models\Township;
use App\Models\LicenceType;
use App\Models\SubLicenceType;
use App\Models\ClinicHistory;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Validator;
use File;
use DB;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clinics = new Clinic();

        if ($request->name != '') {
            $clinics = $clinics->where('clinic_name','like','%'.$request->name.'%')->orwhere('owner','like','%'.$request->name.'%');
        }

        $count = $clinics->count();
        $clinics = $clinics->orderBy('created_at','desc')->paginate(10);

        return view('admin.clinic.index',compact('clinics','count'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $townships = Township::all();
        $licence_types = LicenceType::all();
        $sub_licences = SubLicenceType::all();
        return view('admin.clinic.create',compact('townships','licence_types','sub_licences'));
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
            'clinic_name'=>'required',
            'owner_name'=>'required',
            'clinic_address'=>'required',
            'ph_no'=>'required',
            'nrc'=>'required',
            'owner_address'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);
       if ($validator->passes()) {
                DB::beginTransaction();
                $filename="img_".date("Ymd");
                $path='/uploads/owner_photo/'.date("Ymd").'/';

                $public_path = public_path().$path;

                if(!File::isDirectory($path)){
                    File::makeDirectory($public_path, 0777, true, true);
                }

                $photo="";
                if($request->file('owner_photo')!=NULL){
                    $file = $request->file('owner_photo');
                    $extension = $file->getClientOriginalExtension();
                    $photo = $filename .'.'. $extension;
                    // dd($photo);
                    $file->move($public_path, $photo);
                }

                try {
                        $clinic = Clinic::create([
                        'clinic_name'=> $request->clinic_name,
                        'clinic_address'=> $request->clinic_address,
                        'owner'=>$request->owner_name,
                        'nrc'=>$request->nrc,
                        'address'=>$request->owner_address,
                        'phone'=>$request->ph_no,
                        'path'=>$path,
                        'owner_photo'=>$photo
                    ]
                    );
                    if ($request->clinic_photo != null) {
                            foreach ($request->clinic_photo as $key => $image) {
                                $filename=$key."img_".date("Y-m-d-H-m-s");
                                $path="uploads/clinic_photo/".$filename;
                                if(!File::isDirectory($path)){
                                    File::makeDirectory($path, 0777, true, true);
                                }
                                $photo = "";
                                if ($file = $image) {
                                    $extension = $file->getClientOriginalExtension();
                                    $safeName = $filename . '.' . $extension;
                                    $file->move($path, $safeName);
                                    $photo = $safeName;
                                }

                                $image = Clinic_Photo::create([
                                    'clinic_id'=>$clinic->id,
                                    'path'=>$path,
                                    'clinic_photo'=>$photo,
                                ]);
                            }
                        }
                        // dd(date('Y-m-d H:i:s',$request->issue_date));

                        $history = ClinicHistory::create([
                            'clinic_id'=>$clinic->id,
                            'lic_id'=>$request->licence_id,
                            'sub_lic_id'=>$request->sub_licences_id,
                            'tsh_id'=>$request->tsh_id,
                            'lic_no'=>$request->licence_no,
                            'issue_date'=>date('Y-m-d', strtotime($request->issue_date)),
                            'duration'=>$request->duration,
                            'expire_date'=>date('Y-m-d', strtotime($request->expire_date))
                        ]);

                        DB::commit();
                } catch (Exception $e) {
                    // dd($e);
                  DB::rollback();
                    return redirect()->route('clinic.index')->with('error','Error');
                } 
                return redirect()->route('clinic.index')->with('success','Success');
       }else{
        return redirect()->route('clinic.index')->with('error','Error');
       }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clinic = Clinic::find($id);
        $clinic_photos = Clinic_Photo::where('clinic_id',$id)->get();
        $histories = ClinicHistory::where('clinic_id',$id)->get();
        $doctors = Doctor::where('clinic_id',$id)->get();
        // dd($history);
        $count = $histories->count();
        return view('admin.clinic.show',compact('clinic','clinic_photos','histories','count','doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinic = Clinic::find($id);

        $townships = Township::all();
        $licence_types = LicenceType::all();
        $sub_licences = SubLicenceType::all();

        $clinic_photos = Clinic_Photo::where('clinic_id',$id)->get();
        $clinic_histories = ClinicHistory::where('clinic_id',$id)->get();
        $clinic_history = $clinic_histories[0];

        return view('admin.clinic.edit',compact('clinic','clinic_photos','townships','licence_types','sub_licences','clinic_history'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $rules = [
            'clinic_name'=>'required',
            'owner_name'=>'required',
            'clinic_address'=>'required',
            'ph_no'=>'required',
            'nrc'=>'required',
            'owner_address'=>'required'
        ];

         // $this->validate($request,$rules);
        $validator = Validator::make($request->all(), $rules);
           if ($validator->passes()) {
            DB::beginTransaction();

            $clinic = Clinic::find($id);

             $filename="img_".date("Ymd");
             $path='/uploads/owner_photo/'.date("Ymd").'/';

             $public_path = public_path().$path;


             $photo = ($request->owner_photo != '') ? $request->owner_photo : $clinic->owner_photo;
            //upload image
            if ($file = $request->file('owner_photo')) {
                // $extension = $file->getClientOriginalExtension();
                // $safeName = str_random('10') . '.' . $extension;
                // $file->move($public_path, $safeName);
                // $photo = $safeName;
                $file = $request->file('owner_photo');
                $extension = $file->getClientOriginalExtension();
                $photo = $filename .'.'. $extension;
                // dd($photo);
                $file->move($public_path, $photo);
            }

            try {
                $clinic = $clinic->update([
                'clinic_name'=> $request->clinic_name,
                'clinic_address'=> $request->clinic_address,
                'owner'=>$request->owner_name,
                'nrc'=>$request->nrc,
                'address'=>$request->owner_address,
                'phone'=>$request->ph_no,
                'path'=>$path,
                'owner_photo'=>$photo
            ]
            );

            // dd($request->all());

            $clinic_photos = ($request->clinic_photos != '') ? $request->clinic_photos : Clinic_Photo::where('clinic_id',$id)->get();
            // dd($clinic_photos);

               if ($request->clinic_photo != null) {
                    $clinics_photo = Clinic_Photo::where('clinic_id',$id)->delete();

                    foreach ($request->clinic_photo as $key => $image) {
                            $filename=$key."img_".date("Ymd");
                            $path='/uploads/clinic/'.date("Ymd").'/';

                            $public_path = public_path().$path;
                            // $photo = "";
                            //upload image
                            if ($file = $image) {
                                // dd("Here");
                                $extension = $file->getClientOriginalExtension();
                                $safeName = $filename . '.' . $extension;
                                $file->move($public_path, $safeName);
                                $clinic_photos = $safeName;
                            }

                            $image = Clinic_Photo::create([
                                'clinic_id'=>$id,
                                'path'=>$path,
                                'clinic_photo'=>$clinic_photos,
                            ]);
                            // dd($image);
                        }
                }
                $clinic_history = ClinicHistory::where('clinic_id',$id)->update([
                    'lic_id'=>$request->licence_id,
                    'sub_lic_id'=>$request->sub_licences_id,
                    'tsh_id'=>$request->tsh_id,
                    'lic_no'=>$request->licence_no,
                    'issue_date'=>date('Y-m-d', strtotime($request->issue_date)),
                    'duration'=>$request->duration,
                    'expire_date'=>date('Y-m-d', strtotime($request->expire_date))
                ]);

                DB::commit();

            } catch (Exception $e) {
                dd($e);
                DB::rollback();
                return redirect()->route('clinic.index')->with('error','Error');
            }
            return redirect()->route('clinic.index')->with('success','Success');
        }else{

         
        return redirect()->route('clinic.index')->with('error'.'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $storagePath = public_path() . '/uploads/owner_photo/';

        $clinic_data = Clinic::findorfail($id);
        $clinic = DB::table('clinic_photos')->where('clinic_id',$id)->delete();
        $clinic = DB::table('clinic_histories')->where('clinic_id',$id)->delete();

        if (File::exists($storagePath . $clinic_data->owner_photo)) {
            File::delete($storagePath . $clinic_data->owner_photo);
        };

        $clinic_data->delete();
        return redirect()->route('clinic.index')->with('success','Successfully');
    }

    public function print($id)
    {
        // dd("Herer");
        $clinic = Clinic::find($id);
        $clinic_histories = ClinicHistory::where('clinic_id',$id)->get();
        $clinic_history = $clinic_histories[0];
        return view('admin.clinic.print',compact('clinic','clinic_history'));
    }
}
