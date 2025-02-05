<!DOCTYPE html>
<html lang="id" x-data x-cloak>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitManage - Kelola Gym dengan Mudah & Efektif</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Animasi ikon fitur saat dihover
            const icons = document.querySelectorAll(".feature-icon");
            icons.forEach(icon => {
                icon.addEventListener("mouseenter", () => {
                    gsap.to(icon, {
                        scale: 1.2,
                        duration: 0.3
                    });
                });
                icon.addEventListener("mouseleave", () => {
                    gsap.to(icon, {
                        scale: 1,
                        duration: 0.3
                    });
                });
            });

            // Efek parallax saat scroll
            const bg = document.querySelector(".bg-parallax");
            window.addEventListener("scroll", () => {
                let scrollPosition = window.pageYOffset;
                bg.style.transform = `translateY(${scrollPosition * 0.5}px)`;
            });
        });
    </script>
</head>

<body class="bg-white text-gray-800 antialiased">
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <header class="py-16 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-fitmanage-blue mb-4">
                Kelola Gym dengan Mudah & Efektif 🚀
            </h1>
            <p class="text-lg md:text-xl text-fitmanage-gray max-w-2xl mx-auto mb-8">
                FitManage membantu gym mengelola member, jadwal, pembayaran, dan laporan dengan lebih mudah.
            </p>

            <div class="flex justify-center space-x-4">
                <a href="#"
                    class="bg-fitmanage-blue text-white px-6 py-3 rounded-lg hover:bg-fitmanage-blue-light transition">
                    Coba Gratis 14 Hari
                </a>
                <a href="{{route('login')}}"
                    class="border border-fitmanage-blue text-fitmanage-blue px-6 py-3 rounded-lg hover:bg-gray-50 transition">
                    Lihat Demo
                </a>
            </div>
        </header>

        <!-- Fitur Utama -->
        <section class="py-16">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center p-6 bg-gray-50 rounded-lg">
                    <div class="text-5xl mb-4 feature-icon">📋</div>
                    <h3 class="font-semibold mb-2">Manajemen Member</h3>
                    <p class="text-gray-600">Pendaftaran, tracking, dan laporan lengkap.</p>
                </div>
                <!-- Tambahkan 3 fitur lainnya dengan pola yang sama -->
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-8 text-center text-gray-600">
            <div class="flex justify-center space-x-4">
                <a href="#" class="hover:text-fitmanage-blue">Tentang Kami</a>
                <a href="#" class="hover:text-fitmanage-blue">Kontak</a>
                <a href="#" class="hover:text-fitmanage-blue">Kebijakan Privasi</a>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>
