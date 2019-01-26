<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetupController extends Controller
{
    public function __construct()
    {
        Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setups = Setup::where('user_id', Auth::id())->get() ?? [];
        return view('Frontend.Setups.index', [
            'authUser' => Auth::user(),
            'setups' => $setups
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function edit(Setup $setup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setup $setup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setup::destroy($id);
        return redirect(route('setups.index'))->with('alert-success', 'Konfiguracja została usunięta!');
    }
}
