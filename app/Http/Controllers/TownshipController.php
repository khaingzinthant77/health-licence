<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    function __construct()
    {
         // $this->middleware('permission:township-list|township-create|township-show|township-edit|township-deiete', ['only' => ['index','show','approve',]]);
         // $this->middleware('permission:township-create', ['only' => ['create','store','approve']]);
         // $this->middleware('permission:township-edit', ['only' => ['edit','update','approve']]);
         // $this->middleware('permission:township-delete', ['only' => ['destroy']]);
         // $this->middleware('permission:township-show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $townships = new Township();
        if ($request->name != '') {
            $townships = $townships->Where('tsh_name_en','like','%'.$request->name.'%');
        }
        $count = $townships->get()->count();
    
        $townships = $townships->orderBy('created_at','desc')->paginate(10);
        return view('admin.township.index',compact('townships','count'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.township.create');
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
            'tsh_name_en'=>'required',
            'tsh_name_mm'=>'required',
            'tsh_short_code'=>'required',
        ];

         $this->validate($request,$rules);
         $township=Township::create([
            'tsh_name_en'=>$request->tsh_name_en,
            'tsh_name_mm'=>$request->tsh_name_mm,
            'tsh_short_code'=>$request->tsh_short_code,
        ]
        );

          return redirect()->route('township.index')->with('success','Township created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $townships = Township::find($id);
        return view('admin.township.show',compact('townships'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $townships = Township::find($id);
        return view('admin.township.edit',compact('townships'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $townships = Township::find($id);
         $townships=$townships->update([
            'tsh_name_en'=>$request->tsh_name_en,
            'tsh_name_mm'=>$request->tsh_name_mm,
            'tsh_short_code'=>$request->tsh_short_code,
        ]
        );

          return redirect()->route('township.index')->with('success','Township updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $townships = Township::find($id);
        $townships->delete();
        return redirect()->route('township.index')->with('success','Township deleted successfully');;
    }
}
