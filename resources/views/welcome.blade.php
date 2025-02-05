<!DOCTYPE html>
<html lang="id" x-data x-cloak>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitManage - Kelola Gym dengan Mudah & Efektif</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

 <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white/80 backdrop-blur-md z-50" x-data="{ isOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center text-2xl font-bold tracking-tight hover:opacity-90 transition-opacity">
                        @include('components.application-logo')
                    </a>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <x-nav-link><a href="#about" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium">Tentang</x-nav-link>
                        <a href="#features" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium">Fitur</a>
                        <a href="#pricing" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium">Harga</a>
                        <a href="#testimonials" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium">Testimoni</a>
                        <a href="#faq" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium">FAQ</a>
                    </div>
                </div>
                <!-- Login/Register Buttons -->
                    @if (Route::has('login'))
                        <div class="flex items-center space-x-3 sm:space-x-2">
                            @auth
                                @php
                                    $redirectUrl = match (auth()->user()->role) {
                                        'admin' => '/admin/dashboard',
                                        'instructor' => '/instructor/dashboard',
                                        default => '/dashboard',
                                    };
                                @endphp

                                <a href="{{ url($redirectUrl) }}"
                                    class="px-4 sm:px-6 py-2 bg-green-500 text-white text-sm sm:text-base rounded-full shadow-md hover:bg-green-600 transition duration-300 transform hover:scale-105">
                                        {{ auth()->user()->name }}
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="px-4 sm:px-6 py-2 bg-blue-500 text-white text-sm sm:text-base rounded-full shadow-md hover:bg-blue-600 transition duration-300 transform hover:scale-105">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-4 sm:px-6 py-2 bg-green-500 text-white text-sm sm:text-base rounded-full shadow-md hover:bg-green-600 transition duration-300 transform hover:scale-105">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900">
                        Kelola Gym dengan Mudah & Efektif
                    </h1>
                    <p class="text-xl text-gray-600">
                        Platform manajemen gym all-in-one untuk mengoptimalkan operasional dan meningkatkan pengalaman member Anda.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/register" class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-green-500 hover:bg-green-600 transition-colors">
                            Coba Gratis 14 Hari
                        </a>
                        <button class="inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors" @click="document.getElementById('demo-video').scrollIntoView({behavior: 'smooth'})">
                            Lihat Demo
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <img src="/hero-illustration.svg" alt="FitManage Dashboard" class="w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Video Demo Section -->
    <section id="demo-video" class="py-20 px-4 bg-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-8">Lihat Bagaimana FitManage Bekerja</h2>
            <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-xl overflow-hidden">
                <!-- Replace with your video player implementation -->
                <div class="w-full h-full flex items-center justify-center">
                    <button class="bg-green-500 text-white rounded-full p-4 hover:bg-green-600 transition-colors">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">Fitur Utama</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Manajemen Member</h3>
                    <p class="text-gray-600">Kelola data member, riwayat kunjungan, dan status keanggotaan dengan mudah.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Jadwal & Booking</h3>
                    <p class="text-gray-600">Sistem reservasi otomatis untuk kelas dan personal trainer.</p>
                </div>
                <!-- Add Feature 3 & 4 similarly -->
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 px-4 bg-white" x-data="{ currentTestimonial: 0 }">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">Apa Kata Pengguna Kami</h2>
            <div class="relative">
                <div class="flex overflow-hidden">
                    <!-- Testimonial slides here -->
                    <template x-for="(testimonial, index) in testimonials" :key="index">
                        <div x-show="currentTestimonial === index" class="w-full flex-shrink-0">
                            <div class="bg-white p-8 rounded-xl text-center">
                                <img :src="testimonial.image" class="w-20 h-20 rounded-full mx-auto mb-4" :alt="testimonial.name">
                                <p class="text-gray-600 mb-4" x-text="testimonial.content"></p>
                                <h4 class="font-semibold" x-text="testimonial.name"></h4>
                                <p class="text-gray-500 text-sm" x-text="testimonial.position"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 px-4 bg-gray-50">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">Pertanyaan yang Sering Diajukan</h2>
            <div class="space-y-4">
                <!-- FAQ items using Alpine.js -->
                <template x-for="(faq, index) in faqs" :key="index">
                    <div x-data="{ isOpen: false }" class="border border-gray-200 rounded-lg">
                        <button @click="isOpen = !isOpen" class="w-full flex justify-between items-center p-4 text-left">
                            <span x-text="faq.question" class="font-medium"></span>
                            <svg :class="{ 'rotate-180': isOpen }" class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="isOpen" x-collapse>
                            <div class="p-4 border-t border-gray-200">
                                <p x-text="faq.answer" class="text-gray-600"></p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 bg-green-500">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">Siap Mengoptimalkan Gym Anda?</h2>
            <p class="text-white/90 text-xl mb-8">Mulai 14 hari trial gratis dan rasakan perbedaannya.</p>
            <a href="/register" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-lg text-green-600 bg-white hover:bg-green-50 transition-colors">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <h3 class="font-semibold mb-4">Produk</h3>
                <ul class="space-y-2">
                    <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Fitur</a></li>
                    <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors">Harga</a></li>
                    <li><a href="#faq" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                </ul>
            </div>
            <!-- Add more footer columns as needed -->
        </div>
        <div class="max-w-7xl mx-auto mt-8 pt-8 border-t border-gray-800">
            <p class="text-gray-400 text-center">&copy; 2024 FitManage. All rights reserved.</p>
        </div>
    </footer>


    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- JavaScript -->
    <script>
        // Initialize GSAP ScrollTrigger
        gsap.registerPlugin(ScrollTrigger);

        // Animations
        gsap.from('.hero-title', {
            duration: 1,
            y: 50,
            opacity: 0,
            ease: 'power3.out'
        });

        // Features animation
        gsap.from('.feature-card', {
            scrollTrigger: {
                trigger: '.features-section',
                start: 'top center'
            },
            duration: 0.8,
            y: 50,
            opacity: 0,
            stagger: 0.2
        });

        // Alpine.js Data and Animations
        document.addEventListener('alpine:init', () => {
            Alpine.data('navigation', () => ({
                isOpen: false,
                scrolled: false,

                init() {
                    window.addEventListener('scroll', () => {
                        this.scrolled = window.pageYOffset > 10;
                    });
                }
            }));

            Alpine.data('testimonials', () => ({
                currentIndex: 0,
                items: [{
                        name: 'John Doe',
                        position: 'Pemilik Gym XYZ',
                        content: 'FitManage telah membantu kami mengoptimalkan operasional gym dan meningkatkan kepuasan member secara signifikan.',
                        image: '/testimonial1.jpg'
                    },
                    {
                        name: 'Jane Smith',
                        position: 'Manager Fitness Center ABC',
                        content: 'Sistem booking dan manajemen member yang user-friendly. Support tim yang sangat responsif.',
                        image: '/testimonial2.jpg'
                    },
                    {
                        name: 'Mike Johnson',
                        position: 'Personal Trainer',
                        content: 'Tracking progress client jadi lebih mudah. Sangat membantu untuk monitoring perkembangan member.',
                        image: '/testimonial3.jpg'
                    }
                ],

                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.items.length;
                },

                prev() {
                    this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items
                        .length;
                },

                autoplay: null,

                startAutoplay() {
                    this.autoplay = setInterval(() => this.next(), 5000);
                },

                stopAutoplay() {
                    if (this.autoplay) clearInterval(this.autoplay);
                },

                init() {
                    this.startAutoplay();
                }
            }));

            Alpine.data('faq', () => ({
                items: [{
                        question: 'Bagaimana cara memulai free trial 14 hari?',
                        answer: 'Cukup klik tombol "Coba Gratis 14 Hari" dan ikuti proses registrasi singkat. Tidak diperlukan kartu kredit untuk memulai trial.'
                    },
                    {
                        question: 'Apakah ada batasan fitur selama masa trial?',
                        answer: 'Tidak ada. Anda mendapatkan akses penuh ke semua fitur premium selama 14 hari masa trial.'
                    },
                    {
                        question: 'Berapa banyak member yang bisa dikelola?',
                        answer: 'Tidak ada batasan jumlah member. Sistem kami didesain untuk menangani gym dengan ratusan hingga ribuan member.'
                    },
                    {
                        question: 'Apakah ada integrasi dengan sistem pembayaran?',
                        answer: 'Ya, kami terintegrasi dengan berbagai gateway pembayaran populer seperti Midtrans, Stripe, dan PayPal.'
                    }
                ]
            }));
        });

        // GSAP Animations
        gsap.registerPlugin(ScrollTrigger);

        // Hero Section Animations
        gsap.from('.hero-content', {
            duration: 1,
            y: 50,
            opacity: 0,
            ease: 'power3.out',
            delay: 0.5
        });

        gsap.from('.hero-image', {
            duration: 1,
            x: 50,
            opacity: 0,
            ease: 'power3.out',
            delay: 0.8
        });

        // Features Section Animations
        const featureCards = gsap.utils.toArray('.feature-card');
        featureCards.forEach((card, i) => {
            gsap.from(card, {
                scrollTrigger: {
                    trigger: card,
                    start: 'top 80%'
                },
                duration: 0.8,
                y: 50,
                opacity: 0,
                delay: i * 0.2
            });
        });

        // Video Section Animation
        gsap.from('.video-container', {
            scrollTrigger: {
                trigger: '.video-container',
                start: 'top 70%'
            },
            duration: 1,
            scale: 0.9,
            opacity: 0,
            ease: 'power3.out'
        });

        // Testimonials Section Animation
        gsap.from('.testimonial-container', {
            scrollTrigger: {
                trigger: '.testimonial-container',
                start: 'top 70%'
            },
            duration: 1,
            y: 30,
            opacity: 0,
            ease: 'power3.out'
        });

        // FAQ Section Animation
        const faqItems = gsap.utils.toArray('.faq-item');
        faqItems.forEach((item, i) => {
            gsap.from(item, {
                scrollTrigger: {
                    trigger: item,
                    start: 'top 85%'
                },
                duration: 0.6,
                y: 30,
                opacity: 0,
                delay: i * 0.1
            });
        });

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Video Player
        const videoPlayer = {
            init() {
                const playButton = document.querySelector('.video-play-button');
                if (playButton) {
                    playButton.addEventListener('click', this.playVideo.bind(this));
                }
            },

            playVideo() {
                // Implement your video player logic here
                // This could be a modal with embedded video, custom player, etc.
            }
        };

        videoPlayer.init();
    </script>
</body>
</html>
