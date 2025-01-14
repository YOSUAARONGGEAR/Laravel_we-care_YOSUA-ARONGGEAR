<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Kegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        $report = Report::all();
        return view('welcome', compact('kegiatan', 'report'));
    }

    public function indexKegiatan()
    {
        $kegiatan = Kegiatan::all();
        return view('kegiatan', compact('kegiatan'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Register berhasil, silahkan login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            if ($user->role == 'admin') {
            return redirect()->route('admins.index')->with('success', 'Login berhasil');
            } else {
            return redirect()->route('dashboard.index')->with('success', 'Login berhasil');
            }
        }

        return redirect()->back()->with('error', 'Login gagal, silahkan cek email dan password anda');
    }
}
