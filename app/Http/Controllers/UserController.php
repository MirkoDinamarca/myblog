<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->superadmin) {
            $data['usuarios'] = User::all();
            return view('users.index', $data);
        } else {
            return view('home');
        }
    }

    public function show($user_id)
    {
        if (auth()->user()->superadmin) {
            $data['user'] = User::find($user_id);
            return view('users.show', $data);
        } else {
            return view('home');
        }
    }

    public function update(Request $request)
    {

        if (auth()->user()->superadmin) {

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'username' => 'required|unique:users,username,' . $request->user_id,
                'email' => 'required|unique:users,email,' . $request->user_id,
            ]);

            $user = User::find($request->user_id);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->superadmin = $request->superadmin == 1 ? 1 : 0;
            $user->active = $request->active == 1 ? 1 : 0;
            $user->updated_at = date('Y-m-d H:i:s');

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->route('usuarios')->with('success', '¡Usuario editado correctamente!');
        } else {
            return view('home');
        }
    }
}
