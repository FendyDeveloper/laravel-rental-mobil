<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::where('role', 'user')->get();
        $petugas = User::where('role', 'petugas')->get();
        $admin = User::where('role', 'admin')->get();

        return view('dashboard.users.index', compact('users', 'petugas', 'admin'));
    }

    public function create()
    {
        return view('dashboard.users.form', [
            'page_meta' => [
                'title' => 'Add User',
                'method' => '',
                'url' => route('users.store'),
                'page' => 'create',
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nik' => 'required|string|max:16|unique:users',
            'gender' => 'nullable|in:male,female',
            'telp' => 'nullable|string',
            'address' => 'nullable|string',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,petugas,user',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'address' => $request->address,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.users.form', [
            'user' => $user,
            'page_meta' => [
                'title' => 'Edit User',
                'method' => 'PUT',
                'url' => route('users.update', $user->id),
                'page' => 'edit',
            ]
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nik' => 'nullable|string|max:16|unique:users,nik,' . $user->id,
            'gender' => 'nullable|in:male,female',
            'telp' => 'nullable|string',
            'address' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,petugas,user',
            // 'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = $request->only(['name', 'nik', 'gender', 'telp', 'address', 'email', 'role']);
        // dd($data);
        // Hash password only if it's provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
