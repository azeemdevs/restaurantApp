<x-app-layout>
    <div class="container my-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <i class="fa-solid fa-chair"></i> Table
                <a href="/management/table/create" class="btn btn-success btn-sm float-end"><i
                        class="fa-solid fa-plus me-1"></i>Create Table</a>
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
                                <th>Table</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $Sr = 1;
                            @endphp
                            @foreach ($tables as $table)
                                <tr>
                                    <td>{{ $Sr++ }}</td>
                                    <td>{{ $table->name }}</td>
                                    <td>{{ $table->status }}</td>
                                    <td class="d-flex">
                                        <a href="/management/table/{{ $table->id }}/edit"
                                            class="btn btn-sm btn-warning mx-2">Edit</a>
                                        <form action="/management/table/{{ $table->id }}" method="POST">
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
