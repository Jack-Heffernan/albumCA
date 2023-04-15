<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('All Artists') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-800">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            @forelse ($artists as $artist)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg ">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('admin.artists.show', $artist) }}"> <strong> Artist ID </strong> {{ $artist->id }}</a>
                    </h2>
                    <p class="mt-2">

                        <h3> <strong>Name: </strong>
                        {{$artist->name}} </h3>

                    </p>

                </div>
            @empty
            <p>No Artists found</p>
            @endforelse
            <!-- This line of code simply adds the links for Pagination-->
            {{-- {{$publishers->links()}} --}}
        </div>
    </div>
</x-app-layout>