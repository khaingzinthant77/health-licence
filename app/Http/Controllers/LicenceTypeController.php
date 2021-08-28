<?php

namespace App\Http\Controllers;

use App\Models\LicenceType;
use Illuminate\Http\Request;

class LicenceTypeController extends Controller
{
    function __construct()
    {
         // $this->middleware('permission:licencetype-list|licencetype-create|licencetype-show|licencetype-edit|licencetype-delete', ['only' => ['index','show','approve',]]);
         // $this->middleware('permission:licencetype-create', ['only' => ['create','store','approve']]);
         // $this->middleware('permission:licencetype-edit', ['only' => ['edit','update','approve']]);
         // $this->middleware('permission:licencetype-delete', ['only' => ['destroy']]);
         // $this->middleware('permission:licencetype-show', ['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $licences = new LicenceType();
        if ($request->name != '') {
            $licences = $licences->Where('lic_name','like','%'.$request->name.'%');
        }
        $count = $licences->get()->count();
    
        $licences = $licences->orderBy('created_at','desc')->paginate(10);
        return view('admin.licence.index',compact('licences','count'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        return view('admin.licence.create');
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
            'lic_name'=>'required',
            'short_name'=>'required',
            'rule_no'=>'required',
        ];

         $this->validate($request,$rules);
        $licence=LicenceType::create([
            'lic_name'=>$request->lic_name,
            'short_name'=>$request->short_name,
            'rule_no'=>$request->rule_no,
        ]
        );

          return redirect()->route('licence.index')->with('success','LicenceType created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LicenceType  $licenceType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $licences = LicenceType::find($id);
        return view('admin.licence.show',compact('licences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LicenceType  $licenceType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $licences = LicenceType::find($id);
        return view('admin.licence.edit',compact('licences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LicenceType  $licenceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $licences = LicenceType::find($id);
         $licences=$licences->update([
            'lic_name'=>$request->lic_name,
            'short_name'=>$request->short_name,
            'rule_no'=>$request->rule_no,
        ]
        );

          return redirect()->route('licence.index')->with('success','LicenceType updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LicenceType  $licenceType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $licences = LicenceType::find($id);
        $licences->delete();
        return redirect()->route('licence.index')->with('success','LicenceType deleted successfully');;
    }
}
