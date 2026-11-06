<x-app-layout>
    <div class="container my-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')

            <div class="col-md-8">
                <i class="fa-solid fa-edit"></i> Edit User
                <hr>
                <form action="/management/user/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-2 ">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $user->name }}" placeholder="User name...">
                        @error('name')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                        <label for="name" class="control-label">User Name</label>
                    </div>
                    <div class="form-floating mb-2 ">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ $user->email }}"
                            placeholder="
                            placeholder="Email...">
                        @error('email')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                        <label for="email" class="control-label">Email</label>
                    </div>
                    <div class="form-floating mb-2 ">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password..">
                        @error('password')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <div class="form-floating mb-2">
                        <select name="role" class="form-control">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="cashier"{{ $user->role == 'cashier' ? 'selected' : '' }}>Cashier</option>
                        </select>
                        <label for="Role">Role</label>
                    </div>
                    <div class="form-group mt-3 float-end">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
