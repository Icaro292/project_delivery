<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showLogin()
    {
        // So abre a tela de login. A regra de entrar mesmo fica no metodo login().
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Valida o basico antes de tentar logar, assim evita chegar dado torto no Auth.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Auth::attempt confere email/senha usando o guard padrao do Laravel.
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'E-mail ou senha inválidos.'])
                ->onlyInput('email');
        }

        // Regenera a sessao depois do login, isso ajuda a evitar problema de seguranca.
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    public function showRegister()
    {
        // Tela de cadastro. Admin nao aparece aqui de proposito.
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // O usuario escolhe se é comercio ou motoqueiro. Admin fica via seeder/banco.
        $dados = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'nivel_acesso' => ['required', Rule::in(['comercio', 'motoqueiro'])],
        ]);

        // A senha é criptografada automatico pelo cast "hashed" do model User.
        $user = User::create($dados);

        // Ja deixa logado depois do cadastro, pra nao pedir login de novo.
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        // Sai da conta e limpa a sessao antiga, pra nao ficar nada preso no navegador.
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
