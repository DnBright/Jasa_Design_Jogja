<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Kontrol Panel') }}
            </h2>
            <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                Lihat Landing Page
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-64px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 overflow-hidden shadow-md sm:rounded-2xl mb-8">
                <div class="p-8 text-white">
                    <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-300">Gunakan kontrol panel ini untuk mengelola isi, gambar, layanan, portofolio, dan paket harga pada landing page LokalKarya.</p>
                </div>
            </div>

            <!-- Dashboard Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Card 1: General Settings -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 hover:shadow-md transition-shadow duration-300 flex flex-col justify-between">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-2xl mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Pengaturan Umum</h4>
                        <p class="text-gray-600 text-sm">Sesuaikan judul utama (Hero), teks promosi, nomor WhatsApp admin, rating, dan marquee text.</p>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <a href="{{ route('admin.settings.edit') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 flex items-center justify-between">
                            <span>Kelola Pengaturan</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Services -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 hover:shadow-md transition-shadow duration-300 flex flex-col justify-between">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-2xl mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Layanan Agensi</h4>
                        <p class="text-gray-600 text-sm">Kelola pilar-pilar utama layanan agensi seperti Logo & Branding, Social Media, dan Desain Kemasan.</p>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <a href="{{ route('admin.services.index') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-800 flex items-center justify-between">
                            <span>Kelola Layanan</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Portfolios -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 hover:shadow-md transition-shadow duration-300 flex flex-col justify-between">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center text-2xl mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Karya / Portofolio</h4>
                        <p class="text-gray-600 text-sm">Tambahkan hasil karya agensi beserta gambar, deskripsi, kategori (Branding, Packaging), dan urutannya.</p>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <a href="{{ route('admin.portfolios.index') }}" class="text-sm font-semibold text-amber-600 hover:text-amber-800 flex items-center justify-between">
                            <span>Kelola Portofolio</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Card 4: Pricing Plans -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 hover:shadow-md transition-shadow duration-300 flex flex-col justify-between">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-rose-100 text-rose-600 rounded-xl flex items-center justify-center text-2xl mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Paket Harga</h4>
                        <p class="text-gray-600 text-sm">Sesuaikan harga promo, coret harga asli, urutan, badge populer, dan rincian fitur-fitur paket harga.</p>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <a href="{{ route('admin.pricing-plans.index') }}" class="text-sm font-semibold text-rose-600 hover:text-rose-800 flex items-center justify-between">
                            <span>Kelola Paket Harga</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
