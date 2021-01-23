<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Township;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $townships = Township::with('clinics')->get();
        // dd($townships);
        return view('dashboard',compact('townships'));
    }
}
