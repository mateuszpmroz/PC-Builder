<?php

namespace App\Http\Controllers\Frontend;

use App\Application;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $applications = Application::get()->all();
        $programs = Application::filterByPrograms($applications);
        $games = Application::filterByGames($applications);
        return view('Frontend.index', [
            'authUser' => Auth::user(),
            'programs' => $programs,
            'games' => $games
        ]);
    }
}
