<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\LandingSetting;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\PricingPlan;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. General Settings
        LandingSetting::create([
            'hero_badge' => 'Agensi Kreatif Asli Jogja',
            'hero_title' => 'Bikin Brand Lokal Tampil Global.',
            'hero_subtitle' => 'Nggak perlu budget sultan buat punya desain berkelas. Kami bantu UMKM Jogja naik level dengan visual yang bikin pelanggan melirik dan kompetitor panik.',
            'hero_image' => 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=800&q=80',
            'whatsapp_number' => '628123456789',
            'whatsapp_text' => 'Halo admin, saya tertarik dengan paket layanan di LokalKarya.',
            'rating_text' => 'Rating 4.9/5',
            'rating_subtext' => 'Google Reviews',
            'marquee_items' => [
                '🚀 DESAIN LOGO',
                '🎨 SOCIAL MEDIA MANAGEMENT',
                '📦 KEMASAN PRODUK',
                '📸 FOTO KATALOG'
            ],
        ]);

        // 2. Services
        Service::create([
            'icon' => 'ph-fill ph-pen-nib',
            'icon_bg_color' => 'jogjayellow',
            'icon_text_color' => 'jogjadark',
            'title' => 'Logo & Branding',
            'description' => 'Bikin logo yang gampang diingat, filosofis, dan nggak pasaran. Dari nol sampai jadi identitas kuat.',
            'order' => 1,
        ]);

        Service::create([
            'icon' => 'ph-fill ph-instagram-logo',
            'icon_bg_color' => 'jogjagreen',
            'icon_text_color' => 'white',
            'title' => 'Sosmed Ciamik',
            'description' => 'Feed IG berantakan? Kami rapikan dengan desain konten yang interaktif dan bikin followers betah.',
            'order' => 2,
        ]);

        Service::create([
            'icon' => 'ph-fill ph-package',
            'icon_bg_color' => '#FF9BB3',
            'icon_text_color' => 'jogjadark',
            'title' => 'Desain Kemasan',
            'description' => 'Packaging yang bikin pembeli jatuh cinta pada pandangan pertama sebelum nyobain isinya.',
            'order' => 3,
        ]);

        // 3. Portfolios
        Portfolio::create([
            'title' => 'Ayam Geprek Bu Tejo',
            'description' => 'Rebranding visual identitas dan maskot kuliner lokal.',
            'image' => 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=600&q=80',
            'category' => 'Branding',
            'order' => 1,
        ]);

        Portfolio::create([
            'title' => 'Kopi Merapi Jiwa',
            'description' => 'Desain kemasan pouch kopi roast bean kekinian.',
            'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=600&q=80',
            'category' => 'Packaging',
            'order' => 2,
        ]);

        Portfolio::create([
            'title' => 'Batik Tulis Sekar',
            'description' => 'Manajemen Instagram feed & reels bulanan.',
            'image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=600&q=80',
            'category' => 'Social Media',
            'order' => 3,
        ]);

        // 4. Pricing Plans
        PricingPlan::create([
            'name' => 'Babad Alas',
            'description' => 'Cocok buat yang baru mau merintis usaha.',
            'original_price' => 'Rp 850.000',
            'promo_price' => '499k',
            'features' => [
                'Desain Logo (2 Opsi)',
                'Color Palette & Typography',
                '3 Desain Template Feed IG',
                'Revisi max 2x'
            ],
            'is_popular' => false,
            'popular_badge' => null,
            'cta_text' => 'Pilih Paket',
            'cta_link' => '#kontak',
            'bg_color' => 'bg-white',
            'text_color' => 'text-jogjadark',
            'order' => 1,
        ]);

        PricingPlan::create([
            'name' => 'Mumbul',
            'description' => 'Bikin usahamu kelihatan profesional & siap bersaing.',
            'original_price' => 'Rp 2.500.000',
            'promo_price' => '1.2jt',
            'features' => [
                'Semua di Paket Babad Alas',
                'Desain Kemasan / Label',
                '9 Desain Feed + 3 Story IG',
                'File Master (AI/EPS)'
            ],
            'is_popular' => true,
            'popular_badge' => 'Paling Laris',
            'cta_text' => 'Ambil Promo Ini',
            'cta_link' => '#kontak',
            'bg_color' => 'bg-jogjayellow',
            'text_color' => 'text-jogjadark',
            'order' => 2,
        ]);

        PricingPlan::create([
            'name' => 'Sultan',
            'description' => 'Terima beres. Usahamu auto-glowing paripurna.',
            'original_price' => 'Rp 5.000.000',
            'promo_price' => '2.9jt',
            'features' => [
                'Semua di Paket Mumbul',
                'Full Brand Guidelines (PDF)',
                'Desain Menu / X-Banner',
                'Prioritas Pengerjaan'
            ],
            'is_popular' => false,
            'popular_badge' => null,
            'cta_text' => 'Konsultasi VIP',
            'cta_link' => '#kontak',
            'bg_color' => 'bg-jogjadark',
            'text_color' => 'text-white',
            'order' => 3,
        ]);
    }
}
