<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('Edit Album') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <!-- The route is books.update, this route defined in web.php calls BookController:update() function -->
                <form action="{{ route('admin.albums.update', $album) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="Title"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('title', $album->title)"></x-text-input>

                <x-textarea
                    name="desc"
                    rows="5"
                    field="desc"
                    placeholder="Description..."
                    class="w-full mt-6 text-gray-800"
                    :value="@old('desc', $album->desc)"></x-textarea>


                <div class="form-group mt-4 text-gray-800">
                    <label for="publisher">Genre</label>
                    <select name="genre_id">
                          @foreach ($genres as $genre)
                            <option value="{{$genre->id}}" {{(old('genre_id') == $genre->id) ? "selected" : ""}}>
                              {{$genre->name}}
                            </option>
                          @endforeach
                    </select>
                </div>

                    <div class="form-group text-gray-800">
                        <label for="artists"> <strong></strong> <br> </label>
                        @foreach ($artists as $artist)
                            <input type="checkbox", value="@old{{$artist->id}}" name="artists[]">
                           {{$artist->name}}
                        @endforeach
                    </div>

                    <x-text-input
                        type="text"
                        name="year"
                        field="year"
                        placeholder="Release year"
                        class=" mt-6"
                        :value="@old('year', $album->year)"></x-text-input>

                    <x-text-input
                        type="text"
                        name="rating"
                        field="rating"
                        placeholder="Release rating"
                        class=" mt-6"
                        :value="@old('rating', $album->rating)"></x-text-input>

                    <div class="form-group mt-2">
                    <label for="image"></label>
                    <input type="file" name="image" id="image" class="form-control" required>
                    </div>

               <x-primary-button class="mt-6">Save Album</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>