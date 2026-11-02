@extends('layouts.app')

@section('title', 'Login SISFO')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        min-height: 100vh;
        background:
            radial-gradient(circle at 15% 20%, rgba(160, 35, 75, .35), transparent 35%),
            radial-gradient(circle at 85% 85%, rgba(120, 20, 55, .4), transparent 35%),
            linear-gradient(135deg, #200611, #4b1025, #270713);
        font-family: 'Segoe UI', sans-serif;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px 18px;
    }

    .login-card {
        width: 100%;
        max-width: 460px;
        background: linear-gradient(145deg, #641b35, #3b0b20);
        border: 1px solid rgba(255,255,255,.13);
        border-radius: 24px;
        padding: 45px 42px;
        box-shadow: 0 25px 70px rgba(0,0,0,.45);
        color: #fff;
    }

    .login-logo {
        width: 76px;
        height: 76px;
        margin: 0 auto 20px;
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #a82d54, #74152f);
        border: 1px solid rgba(255,255,255,.2);
        font-size: 32px;
        color: #fff;
        box-shadow: 0 8px 25px rgba(0,0,0,.25);
    }

    .login-heading {
        text-align: center;
        margin-bottom: 32px;
    }

    .login-heading h1 {
        font-size: 25px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #fff;
    }

    .login-heading p {
        font-size: 13px;
        color: #e3c4ce;
        margin: 0;
    }

    .login-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #f4dce4;
        margin-bottom: 9px;
    }

    .login-input {
        width: 100%;
        height: 52px;
        padding: 0 16px;
        border: 1px solid rgba(255,255,255,.18);
        border-radius: 12px;
        background: rgba(35,5,17,.45);
        color: #fff;
        outline: none;
        font-size: 14px;
        transition: .25s;
    }

    .login-input::placeholder {
        color: #c9a5b2;
    }

    .login-input:focus {
        border-color: #e18aa7;
        box-shadow: 0 0 0 3px rgba(225,138,167,.15);
    }

    .login-group {
        margin-bottom: 21px;
    }

    .password-wrap {
        position: relative;
    }

    .password-wrap .login-input {
        padding-right: 65px;
    }

    .toggle-password {
        position: absolute;
        right: 13px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #e6b5c5;
        font-size: 12px;
        cursor: pointer;
    }

    .remember-row {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #e8cbd5;
        font-size: 13px;
        margin: 4px 0 25px;
    }

    .remember-row input {
        accent-color: #e18aa7;
        width: 15px;
        height: 15px;
    }

    .login-button {
        width: 100%;
        height: 53px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #b93660, #8e1d43);
        color: #fff;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: .5px;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(20,0,8,.25);
        transition: .25s;
    }

    .login-button:hover {
        background: linear-gradient(135deg, #d14a75, #a82b53);
        transform: translateY(-2px);
    }

    .login-links {
        text-align: center;
        margin-top: 25px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .login-links a {
        color: #f0b8ca;
        text-decoration: none;
        font-size: 13px;
    }

    .login-links a:hover {
        color: #fff;
        text-decoration: underline;
    }

    .login-footer {
        text-align: center;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid rgba(255,255,255,.13);
        color: #c99eae;
        font-size: 11px;
        letter-spacing: .5px;
    }

    .login-alert {
        background: rgba(30, 100, 60, .25);
        border: 1px solid rgba(150, 230, 180, .3);
        color: #d4f5df;
        padding: 12px;
        border-radius: 10px;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .login-error {
        color: #ffb5c5;
        font-size: 12px;
        display: block;
        margin-top: 7px;
    }

    @media (max-width: 480px) {
        .login-card {
            padding: 35px 24px;
            border-radius: 19px;
        }

        .login-heading h1 {
            font-size: 22px;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-logo">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <div class="login-heading">
            <h1>SISFO AKADEMIK</h1>
            <p>Sistem Informasi Akademik Sekolah</p>
        </div>

        @if (session('status'))
            <div class="login-alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login-group">
                <label class="login-label" for="email">Alamat Email</label>
                <input
                    type="email"
                    class="login-input"
                    id="email"
                    name="email"
                    value="{{ old('email', 'admin@admin.com') }}"
                    placeholder="Masukkan alamat email"
                    required
                    autocomplete="email"
                    autofocus
                >

                @error('email')
                    <span class="login-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="login-group">
                <label class="login-label" for="password">Kata Sandi</label>

                <div class="password-wrap">
                    <input
                        type="password"
                        class="login-input"
                        id="password"
                        name="password"
                        placeholder="Masukkan kata sandi"
                        required
                        autocomplete="current-password"
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword()"
                        id="toggleButton"
                    >
                        Lihat
                    </button>
                </div>

                @error('password')
                    <span class="login-error">{{ $message }}</span>
                @enderror
            </div>

            <label class="remember-row">
                <input
                    type="checkbox"
                    name="remember"
                    {{ old('remember') ? 'checked' : '' }}
                >
                Ingat Saya
            </label>

            <button type="submit" class="login-button">
                <i class="fas fa-sign-in-alt mr-2"></i>
                MASUK SEKARANG
            </button>
        </form>

        <div class="login-links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Lupa Kata Sandi?
                </a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    Belum punya akun? Daftar sekarang
                </a>
            @endif
        </div>

        <div class="login-footer">
            &copy; {{ date('Y') }} SISFO AKADEMIK
            <br>
            Sistem Informasi Akademik Sekolah
        </div>

    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const button = document.getElementById('toggleButton');

        if (password.type === 'password') {
            password.type = 'text';
            button.textContent = 'Sembunyi';
        } else {
            password.type = 'password';
            button.textContent = 'Lihat';
        }
    }
</script>
@endsection