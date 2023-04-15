<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('Albums') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            @forelse ($albums as $album)
                <div class="my-6 p-6 bg-gray border-b border-gray-800 shadow-sm sm:rounded-lg">
                    <tr>
                        <td rowspan="20">
                             <!-- use the asset function, access the file $album->album_image in the folder storage/images -->
                            <img src="{{asset('storage/images/' . $album->album_image) }}" width="100" />
                        </td>
                    </tr>
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('user.albums.show', $album) }}">{{ $album->title }}</a>
                    </h2>
                    <p class="mt-2">
                    Genre:    {{ $album->genre->name}}
                        <br>
                    Year:    {{ $album->year}}
                        <br>
                    Rating:    {{$album->rating}}/10
                    </p>

                </div>
            @empty
            <p>No Albums</p>
            @endforelse
            <!-- This line of code simply adds the links for Pagination-->
            {{-- {{$albums->links()}} --}}
        </div>
    </div>
</x-app-layout>