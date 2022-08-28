<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'id_number' => 'required|string|max:50|unique:users',
            'email' => 'required|unique:users|email',
            'address' => 'required|string|max:50',
            'phone_number' => 'required|numeric',
            'department' =>  'required|string|max:50',
            'password' => 'required|confirmed|min:8',
        ]);
        $users = User::create([
            'name' => $request->input('name'),
            'id_number' => $request->input('id_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'department' => $request->input('department'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::login($users);
        return redirect()->route('home');
        // return back()->with('msg', 'Successfully Registered!');
    }
}
