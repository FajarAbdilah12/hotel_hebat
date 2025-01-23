<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login


public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'tamu',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi Berhasil, Tolong Login.');
    }


    public function showLoginForm()
    {
        return view('auth.login'); // Ganti dengan view yang sesuai
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Memeriksa apakah pengguna ada dan passwordnya benar
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // Mengarahkan pengguna ke halaman berdasarkan peran mereka
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.kamar.index'); // Halaman untuk admin
                case 'resepsionis':
                    return redirect()->route('resepsionis.index'); // Halaman untuk resepsionis
                case 'tamu':
                    return redirect()->route('tamu.dashboard'); // Halaman untuk tamu
                default:
                    return redirect()->route('home'); // Halaman default jika tidak ada peran yang cocok
            }
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email')); // Mengingat email yang dimasukkan
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}