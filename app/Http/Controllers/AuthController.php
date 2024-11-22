<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    // Membuat user baru dan menyimpan ke database
    $user = User::create([
        'name' => $request->name,  // Menyimpan nilai 'name'
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Mengembalikan respon
    return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
}
public function login(Request $request)
{
    // Validasi input login
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Mencari pengguna berdasarkan email
    $user = User::where('email', $request->email)->first();

    // Mengecek kecocokan password
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Membuat token autentikasi untuk pengguna
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(['message' => 'Login successful', 'token' => $token], 200);
}

public function delete(Request $request)
{
    // Middleware auth sudah memastikan request sudah memiliki user yang terautentikasi
    $user = $request->user();
    
    // Menghapus akun pengguna
    $user->delete();

    return response()->json(['message' => 'Account deleted successfully'], 200);
}

}




