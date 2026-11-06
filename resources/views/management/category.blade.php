<x-app-layout>
    <div class="container my-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <i class="fa-solid fa-align-justify"></i> Category
                <a href="/management/category/create" class="btn btn-success btn-sm float-end"><i
                        class="fa-solid fa-plus me-1"></i>Create Category</a>
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
                                <th>Category Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $Sr = 1;
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $Sr++ }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        <a href="/management/category/{{ $category->id }}/edit"
                                            class="btn btn-warning btn-sm mb-2">Edit</a>
                                        <form action="/management/category/{{ $category->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
