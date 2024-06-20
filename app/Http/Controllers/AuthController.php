<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function setViewLogin(){
        return view('auth.login');
    }
    
    public function setViewRegister(){
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/login')->withErrors($validator)->withInput();
        }
    
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->is_active == 1 && Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('after.login'));
        }

        return redirect('/login')->withInput()->withErrors(['email' => 'Invalid email or password or account unactivated.']);
    
    }

    public function register(Request $request)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',

        ]);

        // Jika validasi gagal, kembalikan pesan error
        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator)->withInput();
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->input('name'),
            'username' => Str::slug($request->input('username')),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_active' => 1,
        ]);

        // // Buat kode OTP secara acak
        // $otp = mt_rand(100000, 999999);

        // Simpan kode OTP ke dalam database
        // $user->otp = $otp;
        $user->save();

        // // Kirim email dengan kode OTP
        // Mail::to($request->input('email'))->send(new OtpMail($otp));

        // // Redirect ke halaman untuk memasukkan OTP
        // return redirect()->route('otp.form', ['email' => $user->email]);

        return redirect('/login')->with('alert', 'Akun Anda sekarang aktif Siap Untuk Login.');

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect( route('login') )->with('alert','Thank you');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();

        // Cari pengguna berdasarkan email
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            // Buat pengguna baru jika tidak ditemukan
            $user = new User();
            $googleName = $googleUser->name;


            $user->name = $googleName;
            $user->username = Str::slug($googleName) . '.google';
            $user->email = $googleUser->email;
            $user->avatar = $googleUser->avatar;
            $user->password = bcrypt('random_password');
            $user->save();
        }

        // Login pengguna
        Auth::login($user);

        // Regenerasi sesi
        $request->session()->regenerate();

        // Redirect ke halaman yang sesuai setelah login
        return redirect('/profile');
    }

    public function verifyotp(Request $request)
    {
        // Validasi input
        $request->validate([
            'otp' => 'required|string|min:6|max:6',
        ]);

        // Ambil email dari parameter request
        $email = $request->input('email');

        // Cari pengguna dengan email yang sesuai
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        // Periksa kecocokan OTP
        if ($request->otp != $user->otp) {
            return redirect()->back()->with('error', 'OTP salah.');
        }
        
        if ($request->otp == $user->otp) {
            $user->is_active = 1;
            $user->otp = null;
            $user->save();
            return redirect('/login')->with('alert', 'Verifikasi OTP berhasil. Akun Anda sekarang aktif.');
        }

    }
}
