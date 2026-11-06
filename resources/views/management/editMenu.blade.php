<x-app-layout>
    <div class="container my-4">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')

            <div class="col-md-8">
                <i class="fa-solid fa-hamburger"></i> Edit Menu
                <hr>
                <form action="/management/menu/{{ $menu->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2 ">
                        <label for="name" class="control-label">Menu Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $menu->name }}" placeholder="Menu name...">
                        @error('name')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="price">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" name="price"
                                class="form-control @error('price') is-invalid   @enderror" value="{{ $menu->price }}">
                            <span class="input-group-text">.00</span>
                        </div>
                        @error('price')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>

                        </div>
                        @if ('image')
                            <img height="100" width="100" class="rounded-3 my-2"
                                src="{{ asset('assets/menu_images') }}/{{ $menu->image }}" alt="{{ $menu->name }}">
                        @else
                            <img height="100" width="100" class="rounded-3 my-2"
                                src="{{ asset('assets/menu_images') }}/{{ $menu->temporaryUrl() }}"
                                alt="{{ $menu->name }}">
                        @endif
                        @error('image')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="description">Description</label>
                        <input type="text" name="description"
                            class="form-control @error('description') is-invalid @enderror"
                            value="{{ $menu->description }}" placeholder="description....">
                        @error('description')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="categories">Categories</label>
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select" name="category_id" id="inputGroupSelect01">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $menu->category_id === $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-3 float-end">
                        <button class="btn btn-warning " type="submit">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
