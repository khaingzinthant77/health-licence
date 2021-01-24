<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Township;
use App\Models\User;
use Hash;

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

     public function changePassword()
    {   
        return view('admin.profile.changepassword');
    }

     public function resetPassword(Request $request)
    {   

        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $id = $request->user_id;
        $user = User::find($id);
        $password = $request->get('password');
        $user->email = $user->email;
        $user->password = Hash::make($password);
        $user->save();

        return redirect()->route('change-password.changePassword')
                        ->with('success','Password reset successful!');
    }

}
