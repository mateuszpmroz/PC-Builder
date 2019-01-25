<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Components.index', [
            'authUser' => Auth::user(),
            'components' => Component::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $component = new Component([
            'type' => $request->get('type'),
            'name' => $request->get('name'),
            'points' => $request->get('points'),
            'price' => $request->get('price'),
        ]);
        $component->save();
        $request->session()->flash('alert-success', 'Komponent został dodany!');
        return redirect(route('backend.components'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $component = Component::findOrFail($id);
        $type = $request->get('type');
        $name = $request->get('name');
        $points = $request->get('points');
        $price = $request->get('price');

        $this->validateRequest($request);

        $component->type = $type;
        $component->name = $name;
        $component->points = $points;
        $component->price = $price;

        $component->save();
        $request->session()->flash('alert-success', "Komponent $name został zapisany!");
        return redirect(route('backend.components'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Component::destroy($id);
        return redirect(route('backend.components'))->with('alert-success', 'Komponent został usunięty!');
    }

    private function validateRequest(Request $request)
    {
        $validation = [
            'type' => 'required|max:3|integer',
            'name' => 'required|max:30',
            'points' => 'required|max:1000|integer',
            'price' => 'required|max:10000|integer',
        ];
        $this->validate($request, $validation);
    }
}
