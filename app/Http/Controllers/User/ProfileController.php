<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'phone_number' => 'required|numeric',
            'address' => 'required|string',
        ]);
        // $request->validate([
        //     'name' => 'required|string|max:50',
        //     'id_number' => 'required|string|max:50',
        //     'email' => 'required|unique:users|email',
        //     'address' => 'required|string|max:50',
        //     'phone_number' => 'required|numeric',
        //     'department' =>  'required|string|max:50',
        // ]);
        $users = User::find($id);
        $users->name = $request['name'];
        $users->id_number = $request['id_number'];
        $users->email = $request->input('email');
        $users->address = $request['address'];
        $users->phone_number = $request['phone_number'];
        $users->save();
        // dd("updated");
        return  back()->with('msg', 'Profile Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
