<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Paket Harga') }}
            </h2>
            <a href="{{ route('admin.pricing-plans.create') }}" class="inline-flex items-center px-4 py-2.5 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none transition">
                + Tambah Paket
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
                                <th class="pb-3 px-4">Nama Paket</th>
                                <th class="pb-3 px-4">Harga Promo</th>
                                <th class="pb-3 px-4">Harga Asli (Coret)</th>
                                <th class="pb-3 px-4">Status Populer</th>
                                <th class="pb-3 px-4">Fitur Utama</th>
                                <th class="pb-3 px-4 w-40 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($pricingPlans as $plan)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="py-4 px-4 font-semibold text-gray-600">{{ $plan->order }}</td>
                                    <td class="py-4 px-4">
                                        <div class="font-bold text-gray-800">{{ $plan->name }}</div>
                                        <div class="text-xs text-gray-400 font-medium">{{ $plan->description }}</div>
                                    </td>
                                    <td class="py-4 px-4 font-extrabold text-indigo-700">Rp {{ $plan->promo_price }}</td>
                                    <td class="py-4 px-4 text-gray-400 line-through text-sm">{{ $plan->original_price ?? '-' }}</td>
                                    <td class="py-4 px-4">
                                        @if($plan->is_popular)
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-50 text-amber-700 border border-amber-100 flex items-center gap-1 w-max">
                                                ★ {{ $plan->popular_badge ?? 'Populer' }}
                                            </span>
                                        @else
                                            <span class="text-xs text-gray-400 font-semibold">-</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="text-xs text-gray-600 max-w-xs truncate">
                                            @if(is_array($plan->features))
                                                {{ implode(', ', $plan->features) }}
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.pricing-plans.edit', $plan) }}" class="px-3 py-1.5 bg-amber-50 text-amber-700 border border-amber-200 rounded-lg hover:bg-amber-100 text-xs font-semibold transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.pricing-plans.destroy', $plan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket harga ini?');">
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
                                    <td colspan="7" class="py-8 text-center text-gray-400">
                                        Belum ada paket harga yang ditambahkan.
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
