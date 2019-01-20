<?php

namespace App\Http\Controllers\Backend;

use App\Administrator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user();
        $admin = Administrator::with('user')->findOrFail($userId);
        var_dump('di');
        die;
        if ($admin) {
            var_dump($admin);
        }
        return view('Frontend.index');
    }
}
