<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
class AuthController extends Controller
{
    public function showLogin(){return view('auth.login');}
    public function showRegister(){return view('auth.register');}
    public function login(Request $request){
        $credentials=$request->validate(['email'=>['required','email'],'password'=>['required','string']]);
        if(!Auth::attempt($credentials,$request->boolean('remember')))return back()->withErrors(['email'=>'Email atau password tidak sesuai.'])->withInput();
        $request->session()->regenerate(); return redirect()->intended(route('dashboard'))->with('success','Selamat datang kembali!');
    }
    public function register(Request $request){
        $data=$request->validate(['email'=>['required','email','max:255','unique:users,email'],'username'=>['required','string','min:3','max:30','regex:/^[a-z0-9_]+$/','unique:users,username'],'password'=>['required','confirmed',Password::min(6)]],['username.regex'=>'Username hanya boleh huruf kecil, angka, dan underscore.']);
        $user=DB::transaction(fn()=>User::create($data)); Auth::login($user); $request->session()->regenerate();
        return redirect()->route('dashboard')->with('success','Akun berhasil dibuat. Lengkapi profil Anda.');
    }
    public function google(){return redirect()->route('login')->withErrors(['email'=>'Google SSO belum dikonfigurasi. Tambahkan provider OAuth untuk mengaktifkannya.']);}
    public function logout(Request $request){Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('login');}
}
