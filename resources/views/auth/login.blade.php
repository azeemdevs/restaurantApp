<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form action="{{ route('login') }}" method="POST">
        @csrf
        {{-- Email Address --}}
        <div class="form-group">
            <label for="email" :value="__('Email')">Email</label>
            <input type="email" class="form-control" name="email" :value="old('email')" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        {{-- Password --}}
        <div class="form-group">
            <label for="email" :value="__('Password')">password</label>
            <input type="password" class="form-control" name="password" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="form-group form-check mt-2">
            <label for="rememberme " class="form-label">Remember Me</label>
            <input type="checkbox" class="form-check-input" name="remember">
        </div>
        <div class="form-group d-flex align-items-center justify-content-end mt-4">
            @if (Route::has('password.request'))
                <a class="nav-link me-2" href="{{ route('password.request') }}"> {{ __('Forgot Your Password') }}</a>
            @endif
            <button type="submit" class="btn btn-primary rounded-3">Log in</button>

        </div>


    </form>
</x-guest-layout>
