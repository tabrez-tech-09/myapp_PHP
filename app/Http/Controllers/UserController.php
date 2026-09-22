<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // GET /api/users
    public function index()
    {
        $users = DB::table('users')->get();

        return response()->json($users);
    }


    // POST /api/users
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $id = DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user_id' => $id
        ], 201);
    }


    // GET /api/users/{id}
    public function show($id)
    {
        $user = DB::table('users')->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return response()->json($user);
    }


    // PUT /api/users/{id}
    public function update(Request $request, $id)
    {
        $user = DB::table('users')->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => now(),
            ]);

        return response()->json([
            'message' => 'User updated successfully'
        ]);
    }


    // DELETE /api/users/{id}
    public function destroy($id)
    {
        $user = DB::table('users')->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        DB::table('users')
            ->where('id', $id)
            ->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = DB::table('users')
        ->where('email', $request->email)
        ->first();

    if (!$user || !Hash::check($request->password, $user->password)) {

        return response()->json([
            'message' => 'Invalid email or password'
        ], 401);
    }

    return response()->json([

        'message' => 'Login successful',

        'user' => [

            'id' => $user->id,

            'name' => $user->name,

            'email' => $user->email,

        ]

    ], 200);
    }

    public function logout()
{
    return response()->json([
        'message' => 'Logout successful'
    ], 200);
}
}
