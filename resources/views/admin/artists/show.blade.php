<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('Artist Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-800">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <table class="table table-hover">
                    <tbody>

                        <tr>
                            <td class="font-bold ">ID  </td>
                            <td>{{ $artist->id }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Name:  </td>
                            <td>{{ $artist->name }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>