<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Users.index', [
            'authUser' => Auth::user(),
            'users' => User::all()
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
        $user = new User([
            'login' => $request->get('login'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        $user->save();
        $request->session()->flash('alert-success', 'Użytkownik został dodany!');
        return redirect(route('backend.users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $login = $request->get('login');
        $email = $request->get('email');
        $password = $request->get('password');
        $isPasswordChanged = !empty($password);
        $this->validateRequest($request, $isPasswordChanged);

        $user->login = $login;
        $user->email = $email;
        if ($isPasswordChanged) {
            $user->password = Hash::make($password);
        }
        $user->save();
        $request->session()->flash('alert-success', "Użytkownik $login został zapisany!");
        return redirect(route('backend.users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('backend.users'))->with('alert-success', 'Użytkownik został usunięty!');
    }

    private function validateRequest(Request $request, bool $isPasswordChanged = false)
    {
        $validation = [
            'login' => 'required|max:30',
            'email' => 'required|max:30',
        ];
        $validation = $isPasswordChanged ? array_merge(['password' => 'required|min:6'], $validation) : $validation;
        $this->validate($request, $validation);
    }
}
