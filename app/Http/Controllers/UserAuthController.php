<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "username" => "required|max:20",
            "password" => "required|max:32",
            "nama_lengkap" => "required|max:50",
            "email" => "required|max:50|email",
            "no_hp" => "required|max:50"
        ]);

        $request['level'] = 'Ormas';
        $request['status'] = 'Aktif';

        $user = User::create($request->all());

        if ($user) {
            return response()->json(['status' => 'success', 'message' => 'Registrasi Berhasil']);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Registrasi Gagal'], 400);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:20',
            'password' => 'required|max:32'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && $request->password === $user->password) {
            return response()->json(['status' => 'success', 'message' => 'Login Berhasil', 'token' => $user->id_user.'|'.Hash('sha256', $user->username)]);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Username / Password salah'], 404);
        }
    }

    public function inputLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|max:20',
            'password' => 'required|max:32'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && $request->password === $user->password) {
            $request->session()->regenerate();
            setcookie('id', $user->id_user, time() + 3600 * 24 * 30,'/');
            setcookie('key', Hash('sha256', $request->username), time() + 3600 * 24 * 30,'/');
            return redirect('/');
        }

        Session::flash('message', 'Username / Password salah!');

        return back()->withInput(request()->only('username'));
    }

    public function logout() {
        setcookie('id', '', time() - 1);
        setcookie('key', '', time() - 1);
        return redirect(route('login'));
    }

    public function update(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
        ]);
        $user = User::where('id_user', $_COOKIE['id'])->first();
        if ($user->update($request->all())) {
            return redirect('/');
        } else {
            Session::flash('message','Data User gagal di update!');
            return back();
        }
    }
}
