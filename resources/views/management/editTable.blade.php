<x-app-layout>
    <div class="container my-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')

            <div class="col-md-8">
                <i class="fa-solid fa-table"></i> Update Table
                <hr>
                <form action="/management/table/{{ $table->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="control-label">Table Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $table->name }}">
                        @error('name')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-3 float-end">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
