<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Fibonacci") }}
                </div>
                <div class="p-6 text-gray-900">
                    <form class="w-full max-w-sm" action="{{ route('categories.fibonacci') }}" method="post"
                        id="selectform">
                        @csrf
                        <div class="flex items-center border-b border-teal-500 py-2">
                            <input
                                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none @error('name') is-invalid @enderror"
                                type="text" placeholder="Masukkan angka" aria-label="Full name"
                                value="{{ old('angka') }}" name="angka">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">
                                Submit
                            </button>
                            <span>&nbsp;</span>
                            <a href="{{ route('dashboard') }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Reset</a>
                        </div>
                    </form>
                </div>
                @if(!empty($msg))
                <div class="p-6 text-gray-900">
                    {{ $hasil }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
