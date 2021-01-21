<?php

namespace App\Http\Controllers;

use App\Models\SubLicenceType;
use Illuminate\Http\Request;

class SubLicenceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sublicences = new SubLicenceType();
        if ($request->name != '') {
            $sublicences = $sublicences->Where('sub_lic_name','like','%'.$request->name.'%');
        }
        $count = $sublicences->get()->count();
    
        $sublicences = $sublicences->orderBy('created_at','desc')->paginate(10);
        return view('admin.sublicence.index',compact('sublicences','count'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sublicence.create');
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
            'sub_lic_name'=>'required',
            'sub_lic_short'=>'required',
        ];

         $this->validate($request,$rules);
         $sublicence=SubLicenceType::create([
            'sub_lic_name'=>$request->sub_lic_name,
            'sub_lic_short'=>$request->sub_lic_short,
        ]
        );

          return redirect()->route('sublicence.index')->with('success','SubLicenceType created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubLicenceType  $subLicenceType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $sublicences = SubLicenceType::find($id);
        return view('admin.sublicence.show',compact('sublicences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubLicenceType  $subLicenceType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $sublicences = SubLicenceType::find($id);
        return view('admin.sublicence.edit',compact('sublicences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubLicenceType  $subLicenceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sublicences = SubLicenceType::find($id);
         $sublicence=$sublicences->update([
            'sub_lic_name'=>$request->sub_lic_name,
            'sub_lic_short'=>$request->sub_lic_short,
        ]
        );

          return redirect()->route('sublicence.index')->with('success','SubLicenceType updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubLicenceType  $subLicenceType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sublicences = SubLicenceType::find($id);
        $sublicences->delete();
        return redirect()->route('sublicence.index')->with('success','SubLicenceType deleted successfully');;
    }
}
