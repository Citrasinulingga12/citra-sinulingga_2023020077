<x-filament-panels::page>
    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-2">Daftar Ujian Tersedia</h2>
            <p class="text-sm text-gray-600">Pilih mata pelajaran untuk memulai ujian. Setiap ujian memiliki 150 soal.</p>
        </div>

        {{ $this->table }}
    </div>
</x-filament-panels::page>
