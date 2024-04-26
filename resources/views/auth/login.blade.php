    @extends('layouts.app')

    @section ('content')

<div class="content">
    <h2>Se connecter</h2>
    <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-element form-stack">
        <label for="username-login" class="form-label">Adresse email</label>
        <input id="username-login" class="@error('email') is-invalid @enderror" required name="email" value="{{ old('email') }}" type="text" name="email" placeholder="saisir votre email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-element form-stack">
        <label for="password-login" class="form-label">Mot de passe</label>
        <input id="password-login" class="@error('password') is-invalid @enderror" name="password" type="password" required name="mot de passe">
        @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
    @enderror
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary" style="background: #2079a3 ">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
    </form>
</div>

    @endsection
