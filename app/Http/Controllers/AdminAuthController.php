<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Validation\ValidationException;

/**
 * @group Admin authentication
 *
 * APIs for managing admin authentication
 */
class AdminAuthController extends Controller
{
    /**
     * Login admin
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     * @urlParam email string required Admin email.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            // Mendapatkan data session
            $sessionData = [
                'id' => Auth::guard('admin')->user()->id,
                'name' => Auth::guard('admin')->user()->name,
                'email' => Auth::guard('admin')->user()->email,
                'session_id' => $request->session()->getId(),
            ];

            return response()->json([
                'message' => 'Login successful',
                'session' => $sessionData, // Kirim data session ke response JSON
            ]);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    /**
     * Logout admin
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @authenticated
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout successful']);
    }

    /**
     * Register admin
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @urlParam name string required Admin name. Example: John Doe
     */
    public function register(Request $request)
    {
        try {
            // Validasi input
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|string|min:8',
            ]);

            // Buat admin baru
            $admin = Admin::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Login admin setelah registrasi
            Auth::guard('admin')->login($admin);

            return response()->json(['message' => 'Registration successful']);
        } catch (ValidationException $e) {
            // Tampilkan pesan error kustom
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Tangani error lain yang mungkin terjadi
            return response()->json(['error' => 'An error occurred during registration. Please try again later.'], 500);
        }
    }
}
