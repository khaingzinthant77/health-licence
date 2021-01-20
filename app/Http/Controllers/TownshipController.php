<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
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
    public function show(Township $township)
    {
        //
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
