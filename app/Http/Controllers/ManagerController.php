<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;

class ManagerController extends Controller
{
    public function GetAllUser() {
        $users = User::all();

        return view('manager.dashboard', compact('users'));
    }

    public function GetAllClass() {
        $users = User::all();

        return view('manager.dashboard', compact('users'));
    }

    public function DeleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('delete-user-success', 'User dengan nama ' . $user->name . ' berhasil dihapus.');
    }

    public function CreateNewUser(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        return redirect()->back()->with('create-user-success', 'User dengan nama ' . $request->name . ' berhasil ditambahkan.');
    }

    public function EditUserData(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'lowercase', 'email', 'max:255',
                Rule::unique('users')->ignore($id), // ignore email milik user yang sedang diedit
            ],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('update-user-success', 'User dengan nama ' . $user->name . ' berhasil diupdate.');
    }
}
