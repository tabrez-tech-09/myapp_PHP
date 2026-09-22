<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
    return response()->json(
        DB::table('users')->get()
    );
}

    public function store(Request $request){
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

    public function show(int $id){
        $user = DB::table('users')->find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function update(Request $request, int $id){
        $user = DB::table('users')->find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        DB::table('users')->where('id', $id)->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'User updated successfully']);
    }

    function destroy(int $id){
        $user = DB::table('users')->find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        DB::table('users')->where('id', $id)->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
