<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Portofolio / Hasil Karya') }}
            </h2>
            <a href="{{ route('admin.portfolios.create') }}" class="inline-flex items-center px-4 py-2.5 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none transition">
                + Tambah Karya
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-64px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-lg text-emerald-800 shadow-sm flex items-center gap-3">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-100 text-gray-500 text-sm font-semibold">
                                <th class="pb-3 px-4 w-16">Urutan</th>
                                <th class="pb-3 px-4 w-28">Gambar</th>
                                <th class="pb-3 px-4">Judul Karya</th>
                                <th class="pb-3 px-4">Kategori</th>
                                <th class="pb-3 px-4">Deskripsi</th>
                                <th class="pb-3 px-4 w-40 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($portfolios as $portfolio)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="py-4 px-4 font-semibold text-gray-600">{{ $portfolio->order }}</td>
                                    <td class="py-4 px-4">
                                        <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}" class="w-20 h-14 rounded-lg object-cover border border-gray-100 shadow-sm">
                                    </td>
                                    <td class="py-4 px-4 font-bold text-gray-800">{{ $portfolio->title }}</td>
                                    <td class="py-4 px-4">
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-indigo-50 text-indigo-700 border border-indigo-100">
                                            {{ $portfolio->category }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600 text-sm max-w-xs truncate">{{ $portfolio->description }}</td>
                                    <td class="py-4 px-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="px-3 py-1.5 bg-amber-50 text-amber-700 border border-amber-200 rounded-lg hover:bg-amber-100 text-xs font-semibold transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karya portofolio ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-700 border border-red-200 rounded-lg hover:bg-red-100 text-xs font-semibold transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-8 text-center text-gray-400">
                                        Belum ada portofolio yang ditambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
