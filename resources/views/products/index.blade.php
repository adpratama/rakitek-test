<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Products") }}
        </h2>

        <div class="">
            <a
                href="{{ route('products.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Tambah Kategori
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <!-- <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 ">Id</th> -->
                                <th
                                    class="border-b font-medium p-4 pl-8 pt-0 pb-3"
                                >
                                    Nama
                                </th>
                                <th
                                    class="border-b font-medium p-4 pl-8 pt-0 pb-3"
                                >
                                    Harga
                                </th>
                                <th
                                    class="border-b font-medium p-4 pl-8 pt-0 pb-3"
                                >
                                    Kategori
                                </th>
                                <th
                                    class="border-b font-medium p-4 pl-8 pt-0 pb-3"
                                >
                                    Slug
                                </th>
                                <th
                                    class="border-b font-medium p-4 pl-8 pt-0 pb-3"
                                >
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td class="border-b border-slate-100 p-4 pl-8">
                                    {{$item->name}}
                                </td>
                                <td class="border-b border-slate-100 p-4 pl-8">
                                    Rp<span class="align-numbers">
                                        {{ number_format($item->price , 2, ',', '.') }}
                                    </span>
                                </td>
                                <td class="border-b border-slate-100 p-4 pl-8">
                                    {{$item->category_id}}
                                </td>
                                <td class="border-b border-slate-100 p-4 pl-8">
                                    {{$item->slug}}
                                </td>
                                <td class="border-b border-slate-100 p-4 pl-8">
                                    <a
                                        href="{{ route('products.edit', $item->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Edit
                                    </a>
                                    <span>&nbsp;</span>
                                    <form
                                        action="{{ route('products.destroy', $item->id)}}"
                                        method="post"
                                        class="d-inline"
                                    >
                                        @csrf @method('delete')
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        >
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{$items->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
