<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Umum Landing Page') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-64px)]">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-lg text-emerald-800 shadow-sm flex items-center gap-3">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8 space-y-8">
                @csrf

                <!-- Section: Hero Content -->
                <div>
                    <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-3 mb-6">1. Bagian Hero & Banner</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="hero_badge" class="block text-sm font-semibold text-gray-700 mb-2">Badge Hero</label>
                            <input type="text" name="hero_badge" id="hero_badge" value="{{ old('hero_badge', $settings->hero_badge) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Agensi Kreatif Asli Jogja" required>
                            @error('hero_badge') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="hero_title" class="block text-sm font-semibold text-gray-700 mb-2">Judul Utama (Hero Title)</label>
                            <input type="text" name="hero_title" id="hero_title" value="{{ old('hero_title', $settings->hero_title) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Bikin Brand Lokal Tampil Global." required>
                            @error('hero_title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="hero_subtitle" class="block text-sm font-semibold text-gray-700 mb-2">Subjudul Hero</label>
                            <textarea name="hero_subtitle" id="hero_subtitle" rows="3" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Tuliskan penjelasan singkat..." required>{{ old('hero_subtitle', $settings->hero_subtitle) }}</textarea>
                            @error('hero_subtitle') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="hero_image_file" class="block text-sm font-semibold text-gray-700 mb-2">Upload Gambar Hero</label>
                            <input type="file" name="hero_image_file" id="hero_image_file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <span class="text-xs text-gray-400 mt-1 block">Rekomendasi ukuran: 800x800 px. Maks: 2MB.</span>
                            @error('hero_image_file') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="hero_image_url" class="block text-sm font-semibold text-gray-700 mb-2">Atau URL Gambar Hero</label>
                            <input type="url" name="hero_image_url" id="hero_image_url" value="{{ old('hero_image_url', $settings->hero_image) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="https://example.com/image.jpg">
                            <span class="text-xs text-gray-400 mt-1 block">Gunakan ini jika ingin menggunakan gambar dari eksternal/Unsplash.</span>
                            @error('hero_image_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        @if($settings->hero_image)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Saat Ini</label>
                                <img src="{{ $settings->hero_image }}" alt="Hero Image Current" class="h-40 rounded-2xl object-cover border border-gray-200 shadow-sm">
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Section: WhatsApp & Ratings -->
                <div>
                    <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-3 mb-6">2. Kontak & Sosial</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="whatsapp_number" class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp Admin</label>
                            <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $settings->whatsapp_number) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: 628123456789 (Tanpa tanda +)" required>
                            @error('whatsapp_number') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="whatsapp_text" class="block text-sm font-semibold text-gray-700 mb-2">Template Teks WA</label>
                            <input type="text" name="whatsapp_text" id="whatsapp_text" value="{{ old('whatsapp_text', $settings->whatsapp_text) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Halo admin, saya tertarik...">
                            @error('whatsapp_text') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="rating_text" class="block text-sm font-semibold text-gray-700 mb-2">Teks Rating</label>
                            <input type="text" name="rating_text" id="rating_text" value="{{ old('rating_text', $settings->rating_text) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Rating 4.9/5" required>
                            @error('rating_text') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="rating_subtext" class="block text-sm font-semibold text-gray-700 mb-2">Subteks Rating</label>
                            <input type="text" name="rating_subtext" id="rating_subtext" value="{{ old('rating_subtext', $settings->rating_subtext) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Google Reviews" required>
                            @error('rating_subtext') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Section: Running Text (Marquee) -->
                <div>
                    <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-3 mb-6">3. Teks Berjalan (Marquee Tape)</h3>
                    <div>
                        <label for="marquee_items_raw" class="block text-sm font-semibold text-gray-700 mb-2">Daftar Teks Berjalan (Pisahkan dengan koma)</label>
                        <textarea name="marquee_items_raw" id="marquee_items_raw" rows="3" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: 🚀 DESAIN LOGO, 🎨 SOSIAL MEDIA, 📦 KEMASAN PRODUK" required>{{ old('marquee_items_raw', is_array($settings->marquee_items) ? implode(', ', $settings->marquee_items) : '') }}</textarea>
                        <span class="text-xs text-gray-400 mt-1 block">Tiap item dipisahkan tanda koma (,). Teks ini akan berjalan di tape bawah section hero.</span>
                        @error('marquee_items_raw') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Form Action Buttons -->
                <div class="flex justify-end gap-4 border-t border-gray-100 pt-6">
                    <a href="{{ route('dashboard') }}" class="px-6 py-2.5 bg-white border border-gray-300 rounded-xl font-semibold text-sm text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-indigo-600 border border-transparent rounded-xl font-semibold text-sm text-white shadow-sm hover:bg-indigo-700 focus:outline-none transition">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
