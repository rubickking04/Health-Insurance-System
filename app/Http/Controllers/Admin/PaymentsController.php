<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Query\Builder;


class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(5);
        return view('admin.payments_table', compact('payments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'fee' => 'required|numeric',
        ]);
        $user = User::find($id);
        $pay = Payment::create([
            'admin_id' => Auth::user()->id,
            'user_id' => $user->id,
            'fee' => $request->input('fee'),
        ]);
        return back()->with('message', 'Successfully Paid!');
    }

    /**
     * Search the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $payments = Payment::where('id', 'LIKE', '%' . $search . '%')->orWhereHas('users', function (Builder $query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })->paginate(10);
        if (count($payments) > 0) {
            return view('admin.payments_Table', compact('payments'));
        } else {
            return back()->with('msg', 'We couldn\'t find "' . $search . '" on this page.');
        }
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
        //
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
