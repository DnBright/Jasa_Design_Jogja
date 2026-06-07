<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Paket Harga: ') }} {{ $pricingPlan->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-64px)]">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.pricing-plans.update', $pricingPlan) }}" method="POST" class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Paket</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $pricingPlan->name) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Babad Alas" required>
                        @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Urutan</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $pricingPlan->order) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        @error('order') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Tagline Deskripsi Singkat</label>
                    <input type="text" name="description" id="description" value="{{ old('description', $pricingPlan->description) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Cocok buat yang baru mau merintis usaha." required>
                    @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="original_price" class="block text-sm font-semibold text-gray-700 mb-2">Harga Asli (Coret)</label>
                        <input type="text" name="original_price" id="original_price" value="{{ old('original_price', $pricingPlan->original_price) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Rp 850.000">
                        @error('original_price') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="promo_price" class="block text-sm font-semibold text-gray-700 mb-2">Harga Promo</label>
                        <input type="text" name="promo_price" id="promo_price" value="{{ old('promo_price', $pricingPlan->promo_price) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: 499k atau 1.2jt" required>
                        @error('promo_price') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Features Raw -->
                <div>
                    <label for="features_raw" class="block text-sm font-semibold text-gray-700 mb-2">Fitur-fitur Paket (Satu Fitur Per Baris)</label>
                    <textarea name="features_raw" id="features_raw" rows="6" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 font-mono text-sm" placeholder="Desain Logo (2 Opsi)&#10;Color Palette & Typography&#10;3 Desain Template Feed IG" required>{{ old('features_raw', is_array($pricingPlan->features) ? implode("\n", $pricingPlan->features) : '') }}</textarea>
                    <span class="text-xs text-gray-400 mt-1 block">Tekan Enter untuk memisahkan fitur.</span>
                    @error('features_raw') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Popular Toggle -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-4 rounded-2xl border border-gray-100">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_popular" id="is_popular" value="1" {{ old('is_popular', $pricingPlan->is_popular) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 h-5 w-5">
                        <label for="is_popular" class="ms-2 block text-sm font-semibold text-gray-700">Tandai Sebagai Terlaris</label>
                    </div>

                    <div>
                        <label for="popular_badge" class="block text-xs font-semibold text-gray-700 mb-1">Badge Populer (Opsional)</label>
                        <input type="text" name="popular_badge" id="popular_badge" value="{{ old('popular_badge', $pricingPlan->popular_badge) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="Contoh: Paling Laris">
                    </div>
                </div>

                <!-- Styling Config -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="bg_color" class="block text-sm font-semibold text-gray-700 mb-2">Class Warna Background Card</label>
                        <select name="bg_color" id="bg_color" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="bg-white" {{ old('bg_color', $pricingPlan->bg_color) == 'bg-white' ? 'selected' : '' }}>Putih (bg-white)</option>
                            <option value="bg-jogjayellow" {{ old('bg_color', $pricingPlan->bg_color) == 'bg-jogjayellow' ? 'selected' : '' }}>Kuning Bata (bg-jogjayellow)</option>
                            <option value="bg-jogjadark" {{ old('bg_color', $pricingPlan->bg_color) == 'bg-jogjadark' ? 'selected' : '' }}>Gelap (bg-jogjadark)</option>
                        </select>
                        @error('bg_color') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="text_color" class="block text-sm font-semibold text-gray-700 mb-2">Class Warna Teks Card</label>
                        <select name="text_color" id="text_color" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="text-jogjadark" {{ old('text_color', $pricingPlan->text_color) == 'text-jogjadark' ? 'selected' : '' }}>Gelap (text-jogjadark)</option>
                            <option value="text-white" {{ old('text_color', $pricingPlan->text_color) == 'text-white' ? 'selected' : '' }}>Putih (text-white)</option>
                        </select>
                        @error('text_color') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- CTA Action Link -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="cta_text" class="block text-sm font-semibold text-gray-700 mb-2">Teks Tombol CTA</label>
                        <input type="text" name="cta_text" id="cta_text" value="{{ old('cta_text', $pricingPlan->cta_text) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        @error('cta_text') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="cta_link" class="block text-sm font-semibold text-gray-700 mb-2">Link Tombol CTA</label>
                        <input type="text" name="cta_link" id="cta_link" value="{{ old('cta_link', $pricingPlan->cta_link) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        @error('cta_link') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-4 border-t border-gray-100 pt-6">
                    <a href="{{ route('admin.pricing-plans.index') }}" class="px-6 py-2.5 bg-white border border-gray-300 rounded-xl font-semibold text-sm text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition">
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
