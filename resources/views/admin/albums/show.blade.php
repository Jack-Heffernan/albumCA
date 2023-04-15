<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('View Album') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="flex">

                <!-- when EDIT BUTTON is clicked, route to albums.edit -->
                <a href="{{ route('admin.albums.edit', $album) }}" class="btn-link ml-auto">Edit</a>

                <!-- delete button is wrapped in a form, with the delete method. -->
                <form action="{{ route('admin.albums.destroy', $album) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete?')">Delete </button>
                </div>
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm text-gray-800 sm:rounded-lg">

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td rowspan="20">
                                <!-- use the asset function, access the file $album->album_image in the folder storage/images -->
                                <img src="{{asset('storage/images/' . $album->album_image) }}" width="100" />
                            </td>
                        </tr>


                        <tr>
                            <td class="font-bold ">Title  </td>
                            <td>{{ $album->title }}</td>
                        </tr>
                        {{-- <tr>
                            <td class="font-bold ">Author  </td>
                            <td>{{ $album->author }}</td>
                        </tr> --}}
                        <tr>
                            <td class="font-bold">Description </td>
                            <td>{{  $album->desc }}</td>
                        </tr>


                        <tr>
                            <td class="font-bold ">Genre </td>
                            <td> {{$album->genre->name }}</td>
                        </tr>


                        <tr>
                            <td class="font-bold">Year </td>
                            <td>{{ $album->year }}</td>
                        </tr>

                        <tr>
                            <td class="font-bold">Rating </td>
                            <td>{{ $album->rating }}</td>
                        </tr>
                    @foreach ($album->artists as $artist)
                        <tr>
                            <td> Artist:    {{ $artist->name}} </td>
                        </tr>
                    <br>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>