<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Clinic_Photo;
use Illuminate\Http\Request;
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
        $clinics = $clinics->orderBy('created_at','asc')->paginate(10);

        return view('admin.clinic.index',compact('clinics','count'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clinic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'clinic_name'=>'required',
            'owner_name'=>'required',
            'clinic_address'=>'required',
            'ph_no'=>'required',
            'nrc'=>'required',
            'owner_address'=>'required'
        ];

         $this->validate($request,$rules);

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
                // dd($request->img);
                foreach ($request->clinic_photo as $key => $image) {
                    // dd($image);
                    $filename=$key."img_".date("Y-m-d-H-m-s");
                    $path="uploads/clinic_photo/".$filename;
                    // dd($path);
     
                    if(!File::isDirectory($path)){
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $photo = "";
                    //upload image
                    if ($file = $image) {
                        // dd("Here");
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
                    // dd($image);
                }
            }

        return redirect()->route('clinic.index')->with('success','Success');;;
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

        return view('admin.clinic.show',compact('clinic','clinic_photos'));
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
        $clinic_photos = Clinic_Photo::where('clinic_id',$id)->get();

        return view('admin.clinic.edit',compact('clinic','clinic_photos'));
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
        $rules = [
            'clinic_name'=>'required',
            'owner_name'=>'required',
            'clinic_address'=>'required',
            'ph_no'=>'required',
            'nrc'=>'required',
            'owner_address'=>'required'
        ];

         $this->validate($request,$rules);
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

        return redirect()->route('clinic.index')->with('success'.'Success');
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

        if (File::exists($storagePath . $clinic_data->owner_photo)) {
            File::delete($storagePath . $clinic_data->owner_photo);
        };

        $clinic_data->delete();
        return redirect()->route('clinic.index')->with('success','Successfully');
    }
}
