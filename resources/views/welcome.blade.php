<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->hero_badge ?? 'LokalKarya' }} - {{ $settings->hero_title ?? 'Agensi Desain UMKM Jogja' }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        jogjaterracotta: '#D95F43', // Warna tanah liat/bata
                        jogjayellow: '#F4B942',     // Kuning kunyit
                        jogjadark: '#2A2A2A',       // Abu-abu sangat gelap (hampir hitam)
                        jogjacream: '#F4EFE6',      // Krem hangat
                        jogjagreen: '#4A7C59'       // Hijau daun
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif'],
                    },
                    boxShadow: {
                        'offset': '6px 6px 0px 0px rgba(42,42,42,1)',
                        'offset-hover': '2px 2px 0px 0px rgba(42,42,42,1)',
                        'offset-sm': '3px 3px 0px 0px rgba(42,42,42,1)',
                    },
                    animation: {
                        'blob': 'blob 7s infinite',
                        'marquee': 'marquee 25s linear infinite',
                    },
                    keyframes: {
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        },
                        marquee: {
                            '0%': { transform: 'translateX(0%)' },
                            '100%': { transform: 'translateX(-100%)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS for Animations & Utilities -->
    <style>
        body {
            background-color: #F4EFE6;
            overflow-x: hidden;
        }

        /* Scroll Reveal Animation */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Hide scrollbar for mobile swipe area but keep functionality */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Custom selection color */
        ::selection {
            background-color: #D95F43;
            color: #F4EFE6;
        }
    </style>
</head>
<body class="antialiased selection:bg-jogjaterracotta selection:text-jogjacream">

    @php
        $whatsappUrl = 'https://wa.me/' . ($settings->whatsapp_number ?? '628123456789') . ($settings->whatsapp_text ? '?text=' . urlencode($settings->whatsapp_text) : '');
    @endphp

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 transition-all duration-300 bg-jogjacream/90 backdrop-blur-md border-b-2 border-jogjadark" id="navbar">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="font-display font-bold text-2xl flex items-center gap-2 text-jogjadark">
                <i class="ph-fill ph-paint-brush-broad text-jogjaterracotta text-3xl"></i>
                Lokal<span class="text-jogjaterracotta">Karya.</span>
            </a>
            
            <div class="hidden md:flex gap-8 font-medium items-center">
                <a href="#layanan" class="hover:text-jogjaterracotta transition-colors">Layanan</a>
                <a href="#karya" class="hover:text-jogjaterracotta transition-colors">Karya Kami</a>
                <a href="#harga" class="hover:text-jogjaterracotta transition-colors">Harga</a>
                
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hover:text-jogjaterracotta transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-jogjaterracotta transition-colors">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:text-jogjaterracotta transition-colors">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>

            <a href="{{ $whatsappUrl }}" target="_blank" class="hidden md:inline-block bg-jogjadark text-jogjacream px-6 py-2.5 rounded-full font-semibold border-2 border-transparent hover:bg-transparent hover:border-jogjadark hover:text-jogjadark shadow-offset-sm hover:shadow-none hover:translate-y-1 transition-all">
                Hubungi Kami
            </a>
            
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-3xl text-jogjadark" id="mobile-menu-btn">
                <i class="ph ph-list"></i>
            </button>
        </div>
        
        <!-- Mobile Dropdown Menu -->
        <div class="hidden md:hidden border-t-2 border-jogjadark px-6 py-4 flex flex-col gap-4 font-medium bg-jogjacream" id="mobile-menu">
            <a href="#layanan" class="hover:text-jogjaterracotta transition-colors py-2">Layanan</a>
            <a href="#karya" class="hover:text-jogjaterracotta transition-colors py-2">Karya Kami</a>
            <a href="#harga" class="hover:text-jogjaterracotta transition-colors py-2">Harga</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="hover:text-jogjaterracotta transition-colors py-2">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-jogjaterracotta transition-colors py-2">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:text-jogjaterracotta transition-colors py-2">Daftar</a>
                    @endif
                @endauth
            @endif
            <a href="{{ $whatsappUrl }}" target="_blank" class="bg-jogjadark text-jogjacream px-6 py-2.5 rounded-full font-semibold border-2 border-transparent hover:bg-transparent hover:border-jogjadark hover:text-jogjadark shadow-offset-sm hover:shadow-none hover:translate-y-1 transition-all text-center">
                Hubungi Kami
            </a>
        </div>
    </nav>

    <!-- HEADER / HERO SECTION -->
    <header class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 px-6 overflow-hidden">
        <!-- Blob background -->
        <div class="absolute top-0 right-0 -z-10 w-full h-full opacity-30 pointer-events-none">
            <div class="absolute top-20 right-10 w-72 h-72 bg-jogjayellow rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
            <div class="absolute top-40 right-40 w-72 h-72 bg-jogjaterracotta rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob" style="animation-delay: 2s;"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-jogjagreen rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob" style="animation-delay: 4s;"></div>
        </div>

        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            <!-- Text Content (Kiri) -->
            <div class="flex-1 text-center lg:text-left z-10 reveal">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border-2 border-jogjadark bg-white text-sm font-bold mb-6 shadow-offset-sm">
                    <span class="w-3 h-3 rounded-full bg-jogjaterracotta animate-pulse"></span>
                    {{ $settings->hero_badge ?? 'Agensi Kreatif Asli Jogja' }}
                </div>
                <h1 class="font-display text-5xl lg:text-7xl font-bold text-jogjadark leading-[1.1] mb-6">
                    {!! $settings->hero_title ?? 'Bikin <span class="text-jogjaterracotta">Brand Lokal</span> Tampil Global.' !!}
                </h1>
                <p class="text-lg lg:text-xl text-gray-700 mb-8 max-w-2xl mx-auto lg:mx-0 font-medium">
                    {{ $settings->hero_subtitle ?? 'Nggak perlu budget sultan buat punya desain berkelas. Kami bantu UMKM Jogja naik level dengan visual yang bikin pelanggan melirik dan kompetitor panik.' }}
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="#harga" class="w-full sm:w-auto bg-jogjaterracotta text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-jogjadark transition-colors shadow-offset hover:translate-y-1 hover:shadow-offset-hover border-2 border-jogjadark">
                        Lihat Harga
                    </a>
                    <a href="#karya" class="w-full sm:w-auto bg-white text-jogjadark px-8 py-4 rounded-xl font-bold text-lg hover:bg-jogjayellow transition-colors border-2 border-jogjadark shadow-offset hover:translate-y-1 hover:shadow-offset-hover flex items-center justify-center gap-2">
                        <i class="ph-fill ph-image text-2xl"></i> Portofolio
                    </a>
                </div>
            </div>

            <!-- Image Content (Kanan) -->
            <div class="flex-1 relative z-10 w-full max-w-lg lg:max-w-none mx-auto reveal delay-100">
                <!-- Main Image Container -->
                <div class="relative rounded-[2rem] border-4 border-jogjadark overflow-hidden shadow-[12px_12px_0px_0px_rgba(42,42,42,1)] transform md:-rotate-3 hover:rotate-0 transition-transform duration-500 bg-white">
                    <img src="{{ $settings->hero_image ?? 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=800&q=80' }}" alt="Hero Image" class="w-full h-[400px] lg:h-[500px] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-tr from-jogjadark/20 to-transparent"></div>
                </div>
                
                <!-- Floating Badges -->
                <div class="absolute -top-5 -right-5 md:-top-8 md:-right-8 bg-jogjayellow border-2 border-jogjadark p-4 rounded-2xl shadow-offset transform rotate-6 animate-bounce" style="animation-duration: 3s;">
                    <p class="font-display font-bold text-jogjadark text-xl md:text-2xl">100+</p>
                    <p class="text-sm font-medium text-jogjadark">UMKM Jogja</p>
                </div>

                <div class="absolute -bottom-6 -left-4 md:-bottom-10 md:-left-10 bg-white border-2 border-jogjadark p-3 md:p-4 rounded-full shadow-offset flex items-center gap-3 transform -rotate-3 hover:scale-110 transition-transform">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-jogjagreen rounded-full flex items-center justify-center text-white text-xl md:text-2xl">
                        <i class="ph-fill ph-star"></i>
                    </div>
                    <div class="pr-2">
                        <p class="font-bold text-jogjadark text-sm md:text-base">{{ $settings->rating_text ?? 'Rating 4.9/5' }}</p>
                        <p class="text-[10px] md:text-xs text-gray-500">{{ $settings->rating_subtext ?? 'Google Reviews' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- MARQUEE TAPE -->
    <div class="bg-jogjadark text-jogjayellow py-3 transform -rotate-2 scale-105 border-y-4 border-jogjadark overflow-hidden flex whitespace-nowrap mb-20 z-20 relative">
        <div class="animate-marquee flex gap-8 text-xl font-display font-bold items-center">
            @if($settings && is_array($settings->marquee_items))
                @foreach(array_merge($settings->marquee_items, $settings->marquee_items) as $item)
                    <span>{{ $item }}</span> <i class="ph-fill ph-star-four"></i>
                @endforeach
            @else
                <span>🚀 DESAIN LOGO</span> <i class="ph-fill ph-star-four"></i>
                <span>🎨 SOCIAL MEDIA MANAGEMENT</span> <i class="ph-fill ph-star-four"></i>
                <span>📦 KEMASAN PRODUK</span> <i class="ph-fill ph-star-four"></i>
                <span>📸 FOTO KATALOG</span> <i class="ph-fill ph-star-four"></i>
                <span>🚀 DESAIN LOGO</span> <i class="ph-fill ph-star-four"></i>
                <span>🎨 SOCIAL MEDIA MANAGEMENT</span> <i class="ph-fill ph-star-four"></i>
                <span>📦 KEMASAN PRODUK</span> <i class="ph-fill ph-star-four"></i>
                <span>📸 FOTO KATALOG</span> <i class="ph-fill ph-star-four"></i>
            @endif
        </div>
    </div>

    <!-- LAYANAN SECTION -->
    <section class="py-12 px-6" id="layanan">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 reveal">
                <h2 class="font-display text-4xl lg:text-5xl font-bold text-jogjadark mb-4">Solusi Visual Buat<br>Segala Kebutuhan</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Dynamic Services -->
                @foreach($services as $index => $service)
                    <div class="bg-white p-8 rounded-3xl border-2 border-jogjadark shadow-offset hover:shadow-offset-hover hover:translate-y-1 hover:{{ $index % 2 === 0 ? '-rotate-1' : 'rotate-1' }} transition-all reveal">
                        <div class="w-14 h-14 rounded-xl border-2 border-jogjadark flex items-center justify-center text-2xl mb-6 shadow-offset-sm" style="background-color: {{ str_starts_with($service->icon_bg_color, '#') ? $service->icon_bg_color : '#F4B942' }}; color: {{ str_starts_with($service->icon_text_color, '#') ? $service->icon_text_color : '#2A2A2A' }}">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        <h3 class="font-display text-2xl font-bold mb-3 text-jogjadark">{{ $service->title }}</h3>
                        <p class="text-gray-600 font-medium">{{ $service->description }}</p>
                    </div>
                @endforeach

                <!-- Custom CTA Card -->
                <div class="group relative bg-jogjaterracotta p-8 rounded-3xl border-2 border-jogjadark shadow-offset reveal delay-300 flex flex-col justify-center items-center text-center">
                    <h3 class="font-display text-3xl font-bold mb-4 text-white">Butuh Custom?</h3>
                    <p class="mb-6 text-white/90 font-medium">Spanduk, flyer, atau menu resto? Yuk ngobrol aja dulu!</p>
                    <a href="{{ $whatsappUrl }}" target="_blank" class="bg-jogjadark text-white px-6 py-3 rounded-xl font-bold hover:bg-jogjacream hover:text-jogjadark transition-all border-2 border-jogjadark">
                        Tanya Admin via WA
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- KARYA / PORTFOLIO SECTION -->
    <section class="py-24 px-6 overflow-hidden bg-white/50" id="karya">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal">
                <div class="text-left">
                    <div class="inline-block px-4 py-1.5 mb-4 rounded-full border-2 border-jogjadark text-sm font-bold uppercase tracking-wider bg-jogjayellow shadow-offset-sm">
                        Karya Kami
                    </div>
                    <h2 class="font-display text-4xl lg:text-5xl font-bold text-jogjadark mb-4">Bukti Nyata,<br>Bukan Cuma Kata</h2>
                    <p class="text-lg text-gray-600 max-w-md font-medium">Geser untuk melihat karya kami untuk sedulur brand lokal Jogja dan sekitarnya.</p>
                </div>
                <div class="hidden md:flex gap-2 mt-4 md:mt-0">
                    <button class="w-12 h-12 rounded-full border-2 border-jogjadark flex items-center justify-center hover:bg-jogjayellow transition-colors shadow-offset-sm"><i class="ph ph-arrow-left text-xl"></i></button>
                    <button class="w-12 h-12 rounded-full border-2 border-jogjadark flex items-center justify-center bg-jogjayellow hover:bg-jogjadark hover:text-white transition-colors shadow-offset-sm"><i class="ph ph-arrow-right text-xl"></i></button>
                </div>
            </div>

            <!-- Horizontal Scroll Container for Mobile, Grid for Desktop -->
            <div class="flex overflow-x-auto snap-x snap-mandatory gap-6 pb-12 pt-4 md:grid md:grid-cols-2 lg:grid-cols-3 md:overflow-visible md:pb-0 no-scrollbar -mx-6 px-6 md:mx-0 md:px-0">
                @foreach($portfolios as $index => $portfolio)
                    <div class="snap-center shrink-0 w-[85vw] md:w-auto group relative overflow-hidden rounded-[2rem] h-[420px] border-2 border-jogjadark shadow-offset {{ $index === 1 ? 'lg:mt-12' : '' }} reveal bg-jogjadark">
                        <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}" class="absolute inset-0 w-full h-full object-cover opacity-80 transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-jogjadark via-jogjadark/40 to-transparent"></div>
                        <div class="absolute inset-0 p-8 flex flex-col justify-between">
                            <div class="self-end bg-jogjayellow text-jogjadark text-xs font-bold px-3 py-1 rounded-full border border-jogjadark">{{ $portfolio->category }}</div>
                            <div>
                                <h4 class="text-white font-display text-3xl font-bold mb-2 transform translate-y-4 group-hover:translate-y-0 transition-transform">{{ $portfolio->title }}</h4>
                                <p class="text-gray-200 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0 delay-75">{{ $portfolio->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- KATALOG HARGA SECTION -->
    <section class="py-24 px-6 bg-[#F9F6F0]" id="harga">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 reveal">
                <div class="inline-block px-4 py-1.5 mb-4 rounded-full border-2 border-jogjadark text-sm font-bold uppercase tracking-wider bg-white shadow-offset-sm">
                    Katalog Harga
                </div>
                <h2 class="font-display text-4xl lg:text-5xl font-bold text-jogjadark mb-4">Harga Sedulur, Hasil Direktur</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto font-medium">Nggak usah takut mahal. Pilih paket yang pas buat kantong dan kebutuhan bisnismu. Transparan, nggak ada biaya ghoib.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 items-center max-w-6xl mx-auto">
                @foreach($pricingPlans as $plan)
                    <div class="{{ $plan->bg_color }} {{ $plan->text_color }} p-8 {{ $plan->is_popular ? 'md:p-10 shadow-[8px_8px_0px_0px_rgba(42,42,42,1)] transform md:-translate-y-4 z-10' : 'rounded-[2rem] shadow-offset hover:shadow-offset-hover hover:translate-y-1' }} border-2 border-jogjadark transition-all reveal relative">
                        
                        @if($plan->is_popular)
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-jogjaterracotta text-white px-6 py-1.5 rounded-full font-bold text-sm border-2 border-jogjadark flex items-center gap-1 shadow-offset-sm whitespace-nowrap">
                                <i class="ph-fill ph-fire"></i> {{ $plan->popular_badge ?? 'Paling Laris' }}
                            </div>
                        @endif

                        <h3 class="font-display text-2xl {{ $plan->is_popular ? 'md:text-3xl' : '' }} font-bold mb-2">{{ $plan->name }}</h3>
                        <p class="font-medium text-sm mb-6 h-10 {{ $plan->bg_color === 'bg-jogjadark' ? 'text-gray-400' : ($plan->bg_color === 'bg-jogjayellow' ? 'text-jogjadark/80' : 'text-gray-500') }}">{{ $plan->description }}</p>
                        
                        <div class="mb-8 pb-8 border-b-2 border-dashed {{ $plan->bg_color === 'bg-jogjadark' ? 'border-gray-600' : ($plan->bg_color === 'bg-jogjayellow' ? 'border-jogjadark/30' : 'border-gray-300') }}">
                            @if($plan->original_price)
                                <span class="text-sm font-bold line-through {{ $plan->bg_color === 'bg-jogjadark' ? 'text-gray-500' : ($plan->bg_color === 'bg-jogjayellow' ? 'text-jogjadark/60' : 'text-gray-500') }}">{{ $plan->original_price }}</span>
                            @endif
                            <div class="flex items-baseline gap-1">
                                <span class="text-2xl font-bold">Rp</span>
                                <span class="text-5xl {{ $plan->is_popular ? 'md:text-6xl' : '' }} font-display font-bold {{ $plan->bg_color === 'bg-jogjadark' ? 'text-jogjayellow' : '' }}">{{ $plan->promo_price }}</span>
                            </div>
                        </div>

                        <ul class="space-y-4 mb-8 font-medium">
                            @if(is_array($plan->features))
                                @foreach($plan->features as $feature)
                                    <li class="flex items-start gap-3">
                                        <i class="ph-fill ph-check-circle text-xl shrink-0 mt-0.5 {{ $plan->bg_color === 'bg-jogjadark' ? 'text-jogjayellow' : ($plan->bg_color === 'bg-jogjayellow' ? 'text-jogjadark' : 'text-jogjagreen') }}"></i>
                                        <span class="{{ $plan->bg_color === 'bg-jogjadark' ? 'text-gray-300' : ($plan->bg_color === 'bg-jogjayellow' ? 'text-jogjadark' : 'text-gray-700') }}">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        
                        <a href="{{ $plan->cta_link == '#kontak' ? $whatsappUrl : $plan->cta_link }}" class="block w-full text-center py-3 rounded-xl font-bold border-2 transition-colors
                            {{ $plan->bg_color === 'bg-jogjadark' ? 'bg-white text-jogjadark hover:bg-jogjayellow border-transparent' : 
                               ($plan->bg_color === 'bg-jogjayellow' ? 'bg-jogjadark text-white hover:bg-jogjaterracotta border-transparent py-4 text-lg shadow-offset hover:translate-y-1 hover:shadow-offset-hover' : 
                               'bg-white text-jogjadark border-jogjadark shadow-offset-sm hover:bg-jogjacream') }}">
                            {{ $plan->cta_text }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA & FOOTER -->
    <section class="py-24 px-6 bg-jogjaterracotta text-white overflow-hidden relative" id="kontak">
        <!-- Decorative blobs -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-jogjadark/20 rounded-full blur-3xl"></div>

        <div class="max-w-4xl mx-auto text-center relative z-10 reveal">
            <h2 class="font-display text-4xl md:text-6xl font-bold mb-6">Siap Bikin Brand-mu Naik Kelas?</h2>
            <p class="text-xl mb-10 opacity-90 font-medium">Jangan biarkan produk bagusmu kalah saing gara-gara desain yang kurang greget. Yuk, diskusi santai bareng tim kami!</p>
            
            <a href="{{ $whatsappUrl }}" target="_blank" class="bg-jogjayellow text-jogjadark px-10 py-5 rounded-full font-bold text-xl hover:bg-white transition-all shadow-[8px_8px_0px_0px_rgba(42,42,42,1)] hover:translate-y-1 hover:shadow-[4px_4px_0px_0px_rgba(42,42,42,1)] border-2 border-jogjadark inline-flex items-center gap-3">
                <i class="ph-fill ph-whatsapp text-3xl"></i> Chat Admin Sekarang
            </a>
        </div>
    </section>

    <footer class="bg-jogjadark text-gray-400 py-8 px-6 text-center border-t border-gray-800">
        <p class="font-medium">© 2026 LokalKarya. Dibuat dengan <i class="ph-fill ph-heart text-jogjaterracotta"></i> di Yogyakarta.</p>
    </footer>

    <!-- JAVASCRIPT UNTUK ANIMASI -->
    <script>
        // Scroll Reveal Animation Script
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal');

            const revealOnScroll = () => {
                const windowHeight = window.innerHeight;
                const elementVisible = 100;

                reveals.forEach((reveal) => {
                    const elementTop = reveal.getBoundingClientRect().top;
                    if (elementTop < windowHeight - elementVisible) {
                        reveal.classList.add('active');
                    }
                });
            };

            // Initial check
            revealOnScroll();

            // Check on scroll
            window.addEventListener('scroll', revealOnScroll);
            
            // Navbar Background blur on scroll
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('shadow-md');
                } else {
                    navbar.classList.remove('shadow-md');
                }
            });

            // Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    const icon = mobileMenuBtn.querySelector('i');
                    if (icon) {
                        if (mobileMenu.classList.contains('hidden')) {
                            icon.className = 'ph ph-list';
                        } else {
                            icon.className = 'ph ph-x';
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>
