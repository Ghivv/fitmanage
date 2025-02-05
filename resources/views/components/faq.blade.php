<!-- FAQ Section -->
<div class="max-w-4xl mx-auto py-12 px-4">
    <h2 class="text-3xl font-bold text-center mb-8">Frequently Asked Questions</h2>

    <div class="space-y-4">
        <!-- Single FAQ Item -->
        <div x-data="{ open: false }" class="border rounded-lg">
            <button
                @click="open = !open"
                class="flex justify-between items-center w-full px-4 py-4 text-left"
            >
                <span class="font-medium">Bagaimana cara memulai trial 14 hari?</span>
                <svg
                    :class="{'rotate-180': open}"
                    class="w-5 h-5 transform transition-transform duration-200"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                class="px-4 pb-4"
            >
                <p class="text-gray-600">
                    Anda dapat memulai trial gratis dengan mengklik tombol "Coba Gratis 14 Hari"
                    di bagian atas halaman. Isi form pendaftaran singkat, dan Anda langsung
                    bisa mengakses semua fitur premium FitManage.
                </p>
            </div>
        </div>

        <!-- Additional FAQ items follow the same pattern -->
    </div>
</div>
