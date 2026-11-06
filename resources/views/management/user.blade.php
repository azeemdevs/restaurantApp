<x-app-layout>
    <div class="container my-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <i class="fa-solid fa-user"></i> User
                <a href="/management/user/create" class="btn btn-success btn-sm float-end"><i
                        class="fa-solid fa-plus me-1"></i>Create
                    User</a>
                <hr>
                @if (Session::has('status'))
                    <div class="alert alert-success" class="close" data-dismiss="alert" role="alert">
                        <strong>{{ Session::get('status') }}</strong>
                    </div>
                @endif

                <div class="table-responsive-sm">
                    <table class="table table-hover table-success">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                        <a href="/management/user/{{ $user->id }}/edit"
                                            class="btn btn-warning btn-sm mb-2">Edit</a>
                                        <form action="/management/user/{{ $user->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
