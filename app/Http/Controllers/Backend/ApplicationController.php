<?php

namespace App\Http\Controllers\Backend;

use App\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Applications.index', [
            'authUser' => Auth::user(),
            'applications' => Application::all()
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
        $application = new Application([
            'graphic_points' => $request->get('graphic_points'),
            'processor_points' => $request->get('processor_points'),
            'ram_points' => $request->get('ram_points'),
            'name' => $request->get('name'),
            'image_url' => $request->get('image_url'),
            'is_program' => $request->get('is_program') ?? 0,
            'power_supplies_points' => $request->get('power_supplies_points'),
        ]);
        $application->save();
        $request->session()->flash('alert-success', 'Aplikacja została dodana!');
        return redirect(route('backend.applications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $graphicPoints = $request->get('graphic_points');
        $processorPoints = $request->get('processor_points');
        $ramPoints = $request->get('ram_points');
        $name = $request->get('name');
        $imageUrl = $request->get('image_url');
        $isProgram = $request->get('is_program');
        $powerSuppliesPoints = $request->get('power_supplies_points');
        $this->validateRequest($request);

        $application->name = $name;
        $application->graphic_points = $graphicPoints;
        $application->processor_points = $processorPoints;
        $application->ram_points = $ramPoints;
        $application->power_supplies_points = $powerSuppliesPoints;
        $application->is_program = $isProgram ?? 0;
        $application->image_url = $imageUrl;

        $application->save();
        $request->session()->flash('alert-success', "Aplikacja $name został zapisany!");
        return redirect(route('backend.applications'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Application::destroy($id);
        return redirect(route('backend.applications'))->with('alert-success', 'Aplikacja została usunięta!');
    }

    private function validateRequest(Request $request)
    {
        $validation = [
            'graphic_points' => 'required|max:1000|integer',
            'processor_points' => 'required|max:1000|integer',
            'ram_points' => 'required|max:1000|integer',
            'name' => 'required|max:30',
            'image_url' => 'required|max:1000',
            'is_program' => 'max:1|integer',
            'power_supplies_points' => 'required|max:1000|integer',
        ];
        $this->validate($request, $validation);
    }
}
