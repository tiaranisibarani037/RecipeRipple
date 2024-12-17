<?php
// filepath: /c:/laragon/www/RecipeRipple/app/Http/Controllers/AdminUserApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserApiController extends Controller
{
    public function index()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->links = [
                'self' => route('api.admin.users.show', ['user' => $user->id]),
                'update' => route('api.admin.users.update', ['user' => $user->id]),
                'delete' => route('api.admin.users.destroy', ['user' => $user->id]),
            ];
        }
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->links = [
            'self' => route('api.admin.users.show', ['user' => $user->id]),
            'update' => route('api.admin.users.update', ['user' => $user->id]),
            'delete' => route('api.admin.users.destroy', ['user' => $user->id]),
        ];
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nomor_telepon' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'password' => bcrypt($request->password),
        ]);

        $user->links = [
            'self' => route('api.admin.users.show', ['user' => $user->id]),
            'update' => route('api.admin.users.update', ['user' => $user->id]),
            'delete' => route('api.admin.users.destroy', ['user' => $user->id]),
        ];

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'nomor_telepon' => 'required|string|max:15',
        ]);

        $user->update($request->all());

        $user->links = [
            'self' => route('api.admin.users.show', ['user' => $user->id]),
            'update' => route('api.admin.users.update', ['user' => $user->id]),
            'delete' => route('api.admin.users.destroy', ['user' => $user->id]),
        ];

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
            'links' => [
                'index' => route('api.admin.users.index'),
                'create' => route('api.admin.users.store'),
            ]
        ]);
    }
}