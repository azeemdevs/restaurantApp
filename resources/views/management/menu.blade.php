<x-app-layout>
    <div class="container my-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <i class="fa-solid fa-hamburger"></i> Menu
                <a href="/management/menu/create" class="btn btn-success btn-sm float-end"><i
                        class="fa-solid fa-plus me-1"></i>Create
                    Menu</a>
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
                                <th>Sr.</th>
                                <th>Menu Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>category name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $Sr = 1;
                            @endphp
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $Sr++ }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td>{{ $menu->price }}</td>
                                    <td><img class=" rounded-3" height="100" width="100"
                                            src="{{ asset('assets/menu_images') }}/{{ $menu->image }}"
                                            alt="{{ $menu->name }}">
                                    </td>
                                    <td>{{ $menu->description }}</td>
                                    <td>{{ $menu->category->name }}</td>
                                    <td>{{ $menu->created_at }}</td>
                                    <td>{{ $menu->updated_at }}</td>
                                    <td>
                                        <a href="/management/menu/{{ $menu->id }}/edit"
                                            class="btn btn-warning btn-sm mb-2">Edit</a>
                                        <form action="/management/menu/{{ $menu->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
