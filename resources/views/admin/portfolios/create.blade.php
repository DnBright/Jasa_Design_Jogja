<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Karya Portofolio Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-64px)]">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8 space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Nama Brand / Karya</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Kopi Merapi Jiwa" required>
                    @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                        <select name="category" id="category" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="Branding" {{ old('category') == 'Branding' ? 'selected' : '' }}>Branding</option>
                            <option value="Packaging" {{ old('category') == 'Packaging' ? 'selected' : '' }}>Packaging</option>
                            <option value="Social Media" {{ old('category') == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                            <option value="Custom" {{ old('category') == 'Custom' ? 'selected' : '' }}>Custom</option>
                        </select>
                        @error('category') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Urutan</label>
                        <input type="number" name="order" id="order" value="{{ old('order', 1) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        @error('order') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Penjelasan Singkat</label>
                    <textarea name="description" id="description" rows="3" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Desain kemasan pouch kopi roast bean kekinian." required>{{ old('description') }}</textarea>
                    @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="image_file" class="block text-sm font-semibold text-gray-700 mb-2">Upload File Gambar Karya</label>
                    <input type="file" name="image_file" id="image_file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    <span class="text-xs text-gray-400 mt-1 block">Rekomendasi ukuran: 600x420 px. Maks: 2MB.</span>
                    @error('image_file') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-2">Atau Gunakan URL Gambar Eksternal</label>
                    <input type="url" name="image_url" id="image_url" value="{{ old('image_url') }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="https://images.unsplash.com/photo-...">
                    @error('image_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end gap-4 border-t border-gray-100 pt-6">
                    <a href="{{ route('admin.portfolios.index') }}" class="px-6 py-2.5 bg-white border border-gray-300 rounded-xl font-semibold text-sm text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-indigo-600 border border-transparent rounded-xl font-semibold text-sm text-white shadow-sm hover:bg-indigo-700 focus:outline-none transition">
                        Tambah Karya
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
