<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Layanan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-64px)]">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.services.store') }}" method="POST" class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8 space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Nama Layanan</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Logo & Branding" required>
                    @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Layanan</label>
                    <textarea name="description" id="description" rows="4" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Tulis rincian layanan..." required>{{ old('description') }}</textarea>
                    @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">Class Ikon Phosphor</label>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', 'ph-fill ph-star') }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: ph-fill ph-pen-nib" required>
                        <span class="text-xs text-gray-400 mt-1 block">Gunakan class dari <a href="https://phosphoricons.com/" target="_blank" class="text-indigo-600 underline">Phosphor Icons</a>.</span>
                        @error('icon') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Urutan Tampil</label>
                        <input type="number" name="order" id="order" value="{{ old('order', 1) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        @error('order') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="icon_bg_color" class="block text-sm font-semibold text-gray-700 mb-2">Warna Background Ikon</label>
                        <input type="text" name="icon_bg_color" id="icon_bg_color" value="{{ old('icon_bg_color', '#F4B942') }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: #F4B942 atau class CSS" required>
                        @error('icon_bg_color') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="icon_text_color" class="block text-sm font-semibold text-gray-700 mb-2">Warna Ikon (Text Color)</label>
                        <input type="text" name="icon_text_color" id="icon_text_color" value="{{ old('icon_text_color', '#2A2A2A') }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: #2A2A2A atau white" required>
                        @error('icon_text_color') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-4 border-t border-gray-100 pt-6">
                    <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 bg-white border border-gray-300 rounded-xl font-semibold text-sm text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-indigo-600 border border-transparent rounded-xl font-semibold text-sm text-white shadow-sm hover:bg-indigo-700 focus:outline-none transition">
                        Tambah Layanan
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
