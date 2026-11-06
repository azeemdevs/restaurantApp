<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form action="{{ route('register') }}" method="POST">
        @csrf
        {{-- Name --}}
        <div class="form-group">
            <label for="name" :value="__('Name')">name</label>
            <input type="text" class="form-control" name="name" :value="old('name')" required autofocus>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        {{-- Email --}}
        <div class="form-group">
            <label for="email" :value="__('Email')">Email</label>
            <input type="email" class="form-control" name="email" required :value="old('email')">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        {{-- Password --}}
        <div class="form-group">
            <label for="password" :value="__('Password')">password</label>
            <input type="password" class="form-control" name="password" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        {{-- Confirm Password --}}
        <div class="form-group">
            <label for="password_Confirm" :value="__('Password Confirmation')">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" required>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="form-group d-flex align-items-center justify-content-end mt-4">
            @if (Route::has('login'))
                <a class="nav-link me-2" href="{{ route('login') }}"> {{ __('Already Registered') }}</a>
            @endif
            <button type="submit" class="btn btn-primary rounded-3">Register</button>

        </div>


    </form>
</x-guest-layout>
