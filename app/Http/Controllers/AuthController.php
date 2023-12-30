<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function login() {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nama_lengkap' => ['required', 'min:3', 'max:255'],
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'alamat' => 'required|min:10',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);   
        
        return redirect('/auth/login')->with('success', 'Berhasil membuat akun');
    }

    public function auth(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $credentials['email'])->first();
        
        if (!$user) {
            return back()->with('error', 'Login Gagal');
        }
    
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
    
            if ($user->role == 'administrator') {
                return redirect()->intended('/dashboard')->with('success', 'Login berhasil');
            } else {
                return redirect('/')->with('success', 'Login berhasil');
            }
            
        }
        return back()->with('error', 'Login Gagal');
    }

    public function logout() 
    {
        Auth::logout();

        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/');
    }

    public function listUser() {
        return view('dashboard.user.index', [
            'title' => 'User list',
            'users' => User::where('role', '!=', 'administrator')->orderBy('id', 'desc')->get()
        ]);
    }

    public function addUser() {
        return view('dashboard.user.create', [
            'title' => 'Tambah user'
        ]);
    }

    public function addUserStore(Request $request) {
        $validatedData = $request->validate([
            'nama_lengkap' => ['required', 'min:3', 'max:255'],
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'alamat' => 'required|min:10',
            'role' => 'required',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);   
        
        return redirect('/dashboard/user')->with('success', 'Berhasil menambahkan user baru');
    }

    public function deleteUser(User $user) {
        $user->delete();
        return redirect('/dashboard/user')->with('success', 'User berhasil dihapus');
    }
}
