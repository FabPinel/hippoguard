<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use App\Models\DiyProduct;
use App\Models\UserVerify;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'index'
        ]);
    }

    public function register()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('auth.register');
    }

    public function login()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'username' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required',
                'password' => 'required|confirmed|min:8',
            ],
            [
                'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
                'password.min' => 'Le mot de passe doit faire au moins 8 caractères.',
                'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            ]
        );


        $save = new User;
        $save->username = trim($request->username);
        $save->first_name = trim($request->first_name);
        $save->last_name = trim($request->last_name);
        $save->email = trim($request->email);
        $save->phone = trim($request->phone);
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(30);
        $save->save();

        $idUser = $save->id;
        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $idUser,
            'token' => $token
        ]);

        $userData = [
            'username' => $save->username,
            'first_name' => $save->first_name,
            'last_name' => $save->last_name,
            'email' => $save->email,
            'phone' => $save->phone
        ];

        Mail::send('emails.register', ['token' => $token, 'user' => $userData], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email register verification');
        });

        return redirect()->route('index')->withSuccess('Vous êtes connecté !');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 0) {
                // Si l'utilisateur est un administrateur
                return redirect()->route('admin.dashboard')->with('success', "Bienvenue administrateur {$user->first_name} {$user->last_name} !");
            } else {
                // Si l'utilisateur est un utilisateur normal
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }

        return back()->withErrors([
            'login' => "Votre adresse email ou votre mot de passe n'est pas correct",
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index')
            ->withSuccess('Vous êtes bien déconnecté !');;
    }

    public static function getUserId()
    {
        if (Auth::check()) {
            return Auth::id();
        } else {
            return null;
        }
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Votre email est incorrect';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Votre e-mail est vérifié. Vous pouvez maintenant vous connecté.";
            } else {
                $message = "Votre e-mail est déjà vérifié. Vous pouvez vous connecté.";
            }
        }

        return redirect()->route('login')->with('message', $message);
    }
}
