<?php

namespace App\Http\Controllers\Frontend;

use App\Application;
use App\Component;
use App\Http\Controllers\Controller;
use App\Setup;
use Illuminate\Http\Request;
use App\Repository\PcBuilderRepository;
use Illuminate\Support\Facades\Auth;

class PcBuilderController extends Controller
{
    public function index($id)
    {
        $application = Application::findOrFail($id);

        $graphicsComponents = PcBuilderRepository::getComponentByTypeAndPoints($application->graphic_points, Component::TYPE_GRAPHICS_CARD);
        $processorComponents = PcBuilderRepository::getComponentByTypeAndPoints($application->processor_points, Component::TYPE_PROCESSOR);
        $ramComponents = PcBuilderRepository::getComponentByTypeAndPoints($application->ram_points, Component::TYPE_RAM);
        $powerSupplyComponents = PcBuilderRepository::getComponentByTypeAndPoints($application->power_supplies_points, Component::TYPE_POWER_SUPPLY);

        return view('Frontend.PcBuilder.index', [
            'authUser' => Auth::user(),
            'application' => $application,
            'graphicsComponents' => $graphicsComponents,
            'processorComponents' => $processorComponents,
            'ramComponents' => $ramComponents,
            'powerSupplyComponents' => $powerSupplyComponents
        ]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);
        $setup = new Setup([
            'user_id' => Auth::id(),
            'ram_id' => $request->get('ram_id'),
            'processor_id' => $request->get('processor_id'),
            'graphic_id' => $request->get('graphic_id'),
            'power_supply_id' => $request->get('power_supply_id'),
        ]);
        $setup->save();
        $request->session()->flash('alert-success', 'Zestaw został dodany!');
        return redirect(route('setups.index'));
    }

    private function validateRequest(Request $request)
    {
        $validation = [
            'ram_id' => 'integer|required',
            'processor_id' => 'integer|required',
            'graphic_id' => 'integer|required',
            'power_supply_id' => 'integer|required',

        ];
        $this->validate($request, $validation);
    }
}