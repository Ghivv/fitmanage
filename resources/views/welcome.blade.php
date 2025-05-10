<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        charcoal: "#011526",
                        cream: "#F2DCC2",
                        malt: "#BFAE99",
                        orange: "#F28B30",
                        flamingo: "#F2522E",
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in': 'fadeIn 1s ease-in',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .gradient-text {
            background: linear-gradient(90deg, #F28B30 0%, #F2522E 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .nav-scroll {
            background-color: rgba(1, 21, 38, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .hero-pattern {
            background-image: radial-gradient(circle at 25% 50%, rgba(242, 220, 194, 0.1) 0%, transparent 50%);
        }
    </style>
</head>

<body class="bg-cream font-sans text-charcoal antialiased">
    <!-- Navbar -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <h1 class="text-3xl font-bold text-charcoal">Fit<span class="gradient-text">Manage</span></h1>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-center space-x-8">
                        <a href="#" class="text-charcoal hover:text-orange font-medium transition duration-150">Home</a>
                        <a href="#" class="text-charcoal hover:text-orange font-medium transition duration-150">Features</a>
                        <a href="#" class="text-charcoal hover:text-orange font-medium transition duration-150">Pricing</a>
                        <a href="#" class="text-charcoal hover:text-orange font-medium transition duration-150">Contact</a>

                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-orange to-flamingo px-6 py-2 text-cream rounded-lg hover:opacity-90 transition duration-150 shadow-lg">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="bg-malt/20 text-charcoal hover:text-orange px-6 py-2 rounded-lg transition duration-150 font-medium">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-orange to-flamingo px-6 py-2 text-cream rounded-lg hover:opacity-90 transition duration-150 shadow-lg">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-charcoal hover:text-orange focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 transition-all duration-300 ease-in-out">
                <div class="flex flex-col space-y-4 mt-4">
                    <a href="#" class="text-charcoal hover:text-orange font-medium transition duration-150">Home</a>
                    <a href="#" class="text-charcoal hover:text-orange font-medium transition duration-150">Features</a>
                    <a href="#" class="text-charcoal hover:text-orange font-medium transition duration-150">Pricing</a>
                    <a href="#" class="text-charcoal hover:text-orange font-medium transition duration-150">Contact</a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-orange to-flamingo text-cream px-6 py-2 rounded-lg text-center hover:opacity-90 transition duration-150">
                                Dashboard
                            </a>
                        @else
                            <div class="flex flex-col space-y-3">
                                <a href="{{ route('login') }}" class="bg-malt/20 text-charcoal hover:text-orange px-6 py-2 rounded-lg text-center transition duration-150 font-medium">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-orange to-flamingo text-cream px-6 py-2 rounded-lg text-center hover:opacity-90 transition duration-150">
                                        Register
                                    </a>
                                @endif
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 md:pt-32 md:pb-24 hero-pattern overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-cream/50 via-cream/30 to-cream/10 z-0"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center py-12 lg:py-16">
                <div class="w-full lg:w-1/2 text-center lg:text-left lg:pr-12" data-aos="fade-right">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        Transform Your <span class="gradient-text">Gym Business</span> Today
                    </h1>
                    <p class="text-lg sm:text-xl mb-8 text-charcoal/80 max-w-lg mx-auto lg:mx-0">
                        The ultimate all-in-one platform to streamline your gym operations, member management, and financial tracking.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                        <a href="#" class="bg-gradient-to-r from-orange to-flamingo text-cream px-6 sm:px-8 py-3 rounded-lg font-semibold hover:opacity-90 transition duration-150 shadow-lg transform hover:scale-105">
                            Start Free Trial
                        </a>
                        <a href="#" class="bg-transparent border-2 border-charcoal text-charcoal px-6 sm:px-8 py-3 rounded-lg font-semibold hover:bg-charcoal hover:text-cream transition duration-150 transform hover:scale-105">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 mt-12 lg:mt-0" data-aos="fade-left">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-orange to-flamingo rounded-2xl opacity-20 blur-lg"></div>
                        <img src="{{ asset('images/banner.png') }}" alt="Gym Management" class="relative rounded-2xl shadow-2xl w-full object-cover transform transition duration-500 hover:scale-[1.02] z-10"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating elements for visual interest -->
        <div class="absolute top-20 left-10 w-16 h-16 rounded-full bg-orange/20 filter blur-xl opacity-70 animate-float animation-delay-100"></div>
        <div class="absolute bottom-1/4 right-20 w-24 h-24 rounded-full bg-flamingo/20 filter blur-xl opacity-70 animate-float animation-delay-300"></div>
    </section>

    <!-- Stats Section -->
    <section class="bg-charcoal text-cream py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="p-6 hover:bg-charcoal/80 rounded-xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <p class="text-4xl font-bold text-orange mb-2">500+</p>
                    <p class="text-sm sm:text-base text-cream/70">Gyms Registered</p>
                </div>
                <div class="p-6 hover:bg-charcoal/80 rounded-xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-4xl font-bold text-orange mb-2">15K+</p>
                    <p class="text-sm sm:text-base text-cream/70">Active Members</p>
                </div>
                <div class="p-6 hover:bg-charcoal/80 rounded-xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <p class="text-4xl font-bold text-orange mb-2">99%</p>
                    <p class="text-sm sm:text-base text-cream/70">Satisfaction Rate</p>
                </div>
                <div class="p-6 hover:bg-charcoal/80 rounded-xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                    <p class="text-4xl font-bold text-orange mb-2">24/7</p>
                    <p class="text-sm sm:text-base text-cream/70">Customer Support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Powerful Features</h2>
                <p class="text-xl text-charcoal/70 max-w-2xl mx-auto">
                    Everything you need to run your fitness business efficiently
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-gradient-to-br from-orange/10 to-flamingo/10 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-building text-2xl gradient-text"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Multi-Gym Management</h3>
                    <p class="text-base text-charcoal/70">Manage multiple gym locations from a single dashboard with real-time synchronization across all branches.</p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-gradient-to-br from-orange/10 to-flamingo/10 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-users text-2xl gradient-text"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Smart Member Tracking</h3>
                    <p class="text-base text-charcoal/70">Comprehensive member profiles with attendance tracking, progress monitoring, and engagement analytics.</p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-md card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-gradient-to-br from-orange/10 to-flamingo/10 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-2xl gradient-text"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Business Analytics</h3>
                    <p class="text-base text-charcoal/70">Powerful reporting tools to track revenue, member growth, and business performance metrics.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">How FitManage Works</h2>
                <p class="text-xl text-charcoal/70 max-w-2xl mx-auto">
                    Simple steps to transform your fitness business
                </p>
            </div>

            <div class="relative">
                <!-- Timeline bar -->
                <div class="hidden md:block absolute left-1/2 top-0 h-full w-1 bg-gradient-to-b from-orange to-flamingo transform -translate-x-1/2"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Step 1 -->
                    <div class="md:pr-16 pb-8 md:pb-16 flex flex-col items-end text-right" data-aos="fade-right">
                        <div class="bg-gradient-to-r from-orange to-flamingo text-cream rounded-full w-14 h-14 flex items-center justify-center mb-4 text-xl font-bold shadow-lg">1</div>
                        <h3 class="text-2xl font-semibold mb-3">Sign Up</h3>
                        <p class="text-base text-charcoal/70">Create your account and complete the quick setup wizard to get started.</p>
                    </div>

                    <!-- Empty div for spacing in the timeline -->
                    <div class="hidden md:block"></div>

                    <!-- Step 2 -->
                    <div class="hidden md:block"></div>
                    <div class="md:pl-16 pb-8 md:pb-16" data-aos="fade-left">
                        <div class="bg-gradient-to-r from-orange to-flamingo text-cream rounded-full w-14 h-14 flex items-center justify-center mb-4 text-xl font-bold shadow-lg">2</div>
                        <h3 class="text-2xl font-semibold mb-3">Configure</h3>
                        <p class="text-base text-charcoal/70">Set up your gym locations, membership plans, and staff permissions.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="md:pr-16 pb-8 md:pb-16 flex flex-col items-end text-right" data-aos="fade-right">
                        <div class="bg-gradient-to-r from-orange to-flamingo text-cream rounded-full w-14 h-14 flex items-center justify-center mb-4 text-xl font-bold shadow-lg">3</div>
                        <h3 class="text-2xl font-semibold mb-3">Import Data</h3>
                        <p class="text-base text-charcoal/70">Bring in your existing member data or start fresh with new signups.</p>
                    </div>

                    <!-- Empty div for spacing in the timeline -->
                    <div class="hidden md:block"></div>

                    <!-- Step 4 -->
                    <div class="hidden md:block"></div>
                    <div class="md:pl-16" data-aos="fade-left">
                        <div class="bg-gradient-to-r from-orange to-flamingo text-cream rounded-full w-14 h-14 flex items-center justify-center mb-4 text-xl font-bold shadow-lg">4</div>
                        <h3 class="text-2xl font-semibold mb-3">Go Live</h3>
                        <p class="text-base text-charcoal/70">Start managing your gym with our powerful tools and watch your business grow.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Trusted by Gym Owners</h2>
                <p class="text-xl text-charcoal/70 max-w-2xl mx-auto">
                    What our customers say about FitManage
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center gap-1 mb-4 text-orange">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-base text-charcoal/80 mb-6 italic">"FitManage has revolutionized how we operate. What used to take hours now takes minutes, and our member satisfaction has never been higher."</p>
                    <div class="flex items-center">
                        <div class="bg-gradient-to-r from-orange/20 to-flamingo/20 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <span class="gradient-text font-bold">BP</span>
                        </div>
                        <div>
                            <p class="font-semibold">Budi Pratama</p>
                            <p class="text-charcoal/60 text-sm">FitPro Gym, Jakarta</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center gap-1 mb-4 text-orange">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-base text-charcoal/80 mb-6 italic">"Our revenue increased by 30% after implementing FitManage. The automated payment reminders alone have been game-changing."</p>
                    <div class="flex items-center">
                        <div class="bg-gradient-to-r from-orange/20 to-flamingo/20 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <span class="gradient-text font-bold">SD</span>
                        </div>
                        <div>
                            <p class="font-semibold">Sinta Dewi</p>
                            <p class="text-charcoal/60 text-sm">PowerFit, Surabaya</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center gap-1 mb-4 text-orange">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-base text-charcoal/80 mb-6 italic">"The analytics dashboard gives me insights I never had before. I can now make data-driven decisions to grow my business."</p>
                    <div class="flex items-center">
                        <div class="bg-gradient-to-r from-orange/20 to-flamingo/20 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                            <span class="gradient-text font-bold">RA</span>
                        </div>
                        <div>
                            <p class="font-semibold">Rudi Anggara</p>
                            <p class="text-charcoal/60 text-sm">GymLife, Bandung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section class="py-16 bg-charcoal text-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Simple, Transparent Pricing</h2>
                <p class="text-xl text-cream/70 max-w-2xl mx-auto">
                    Choose the plan that fits your business needs
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="bg-charcoal/80 p-8 rounded-2xl shadow-lg border border-malt/20 hover:border-orange/50 transition duration-300 transform hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-2xl font-bold mb-2">Starter</h3>
                    <p class="text-base text-cream/70 mb-6">Perfect for new fitness businesses</p>
                    <p class="text-5xl font-bold mb-6">Rp599<span class="text-xl text-cream/60">/month</span></p>

                    <ul class="mb-8 space-y-3">
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">1 gym location</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Up to 200 members</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Basic membership management</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Attendance tracking</span>
                        </li>
                    </ul>

                    <a href="#" class="block w-full bg-gradient-to-r from-malt/80 to-malt text-charcoal text-center py-3 rounded-lg font-semibold hover:opacity-90 transition duration-150">
                        Get Started
                    </a>
                </div>

                <div class="bg-gradient-to-b from-charcoal to-charcoal/90 p-8 rounded-2xl shadow-xl border border-orange/50 transform lg:scale-105 relative" data-aos="fade-up">
                    <div class="absolute top-0 right-0 bg-orange text-charcoal text-xs font-bold py-1 px-3 rounded-bl-lg rounded-tr-lg">POPULAR</div>
                    <h3 class="text-2xl font-bold mb-2">Professional</h3>
                    <p class="text-base text-cream/70 mb-6">For growing fitness businesses</p>
                    <p class="text-5xl font-bold mb-6">Rp999<span class="text-xl text-cream/60">/month</span></p>

                    <ul class="mb-8 space-y-3">
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Up to 3 locations</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Unlimited members</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Class & trainer management</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Automated payments</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Business analytics</span>
                        </li>
                    </ul>

                    <a href="#" class="block w-full bg-gradient-to-r from-orange to-flamingo text-cream text-center py-3 rounded-lg font-semibold hover:opacity-90 transition duration-150">
                        Get Started
                    </a>
                </div>

                <div class="bg-charcoal/80 p-8 rounded-2xl shadow-lg border border-malt/20 hover:border-orange/50 transition duration-300 transform hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold mb-2">Enterprise</h3>
                    <p class="text-base text-cream/70 mb-6">For large gym networks</p>
                    <p class="text-5xl font-bold mb-6">Rp2.499<span class="text-xl text-cream/60">/month</span></p>

                    <ul class="mb-8 space-y-3">
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Unlimited locations</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Unlimited members</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">All Professional features</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Custom API integration</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange mr-3"></i>
                            <span class="text-base">Priority 24/7 support</span>
                        </li>
                    </ul>

                    <a href="#" class="block w-full bg-gradient-to-r from-malt/80 to-malt text-charcoal text-center py-3 rounded-lg font-semibold hover:opacity-90 transition duration-150">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-charcoal to-charcoal/90 text-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-1/2 mb-8 lg:mb-0 text-center lg:text-left" data-aos="fade-right">
                    <h2 class="text-3xl sm:text-4xl font-bold mb-4">Ready to Transform Your Gym?</h2>
                    <p class="text-xl mb-6 text-cream/80 max-w-lg mx-auto lg:mx-0">
                        Join hundreds of gym owners who are already saving time and growing their business with FitManage.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                        <a href="#" class="bg-gradient-to-r from-orange to-flamingo text-cream px-6 sm:px-8 py-3 rounded-lg font-semibold hover:opacity-90 transition duration-150 shadow-lg transform hover:scale-105">
                            Start Free Trial
                        </a>
                        <a href="#" class="bg-transparent border-2 border-cream text-cream px-6 sm:px-8 py-3 rounded-lg font-semibold hover:bg-cream hover:text-charcoal transition duration-150 transform hover:scale-105">
                            Schedule Demo
                        </a>
                    </div>
                </div>
                <div class="lg:w-2/5 mt-8 lg:mt-0" data-aos="fade-left">
                    <div class="bg-charcoal/50 p-8 rounded-xl backdrop-blur-sm border border-cream/20 hover:shadow-lg transition duration-300">
                        <h3 class="text-2xl font-bold mb-6 text-center">Get in Touch</h3>
                        <form id="contactForm" class="space-y-4">
                            <div>
                                <input type="text" placeholder="Your Name" class="w-full px-4 py-3 rounded-lg bg-charcoal/30 border border-cream/30 text-cream placeholder-cream/70 focus:outline-none focus:ring-2 focus:ring-orange">
                            </div>
                            <div>
                                <input type="email" placeholder="Email" class="w-full px-4 py-3 rounded-lg bg-charcoal/30 border border-cream/30 text-cream placeholder-cream/70 focus:outline-none focus:ring-2 focus:ring-orange">
                            </div>
                            <div>
                                <textarea placeholder="Message" rows="3" class="w-full px-4 py-3 rounded-lg bg-charcoal/30 border border-cream/30 text-cream placeholder-cream/70 focus:outline-none focus:ring-2 focus:ring-orange"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-gradient-to-r from-orange to-flamingo text-cream px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition duration-150 transform hover:scale-[1.02]">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-charcoal text-cream py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Fit<span class="gradient-text">Manage</span></h3>
                    <p class="text-cream/70 mb-4">The complete gym management solution for modern fitness businesses.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-cream/70 hover:text-orange transition duration-150"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-cream/70 hover:text-orange transition duration-150"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-cream/70 hover:text-orange transition duration-150"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-cream/70 hover:text-orange transition duration-150"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Product</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Features</a></li>
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Pricing</a></li>
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Integrations</a></li>
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Updates</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Blog</a></li>
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Help Center</a></li>
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Tutorials</a></li>
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Webinars</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">About Us</a></li>
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Careers</a></li>
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Contact</a></li>
                        <li><a href="#" class="text-cream/70 hover:text-orange transition duration-150">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-cream/20 mt-12 pt-8 text-center text-cream/70">
                <p>&copy; 2023 FitManage. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 bg-gradient-to-r from-orange to-flamingo text-cream w-12 h-12 rounded-full flex items-center justify-center shadow-lg transform transition duration-300 opacity-0 invisible hover:scale-110">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Mobile Menu Script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- Scroll Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    </script>

    <!-- Scroll Effects -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('nav-scroll');
            } else {
                navbar.classList.remove('nav-scroll');
            }
        });

        // Back to top button
        const backToTopButton = document.getElementById('backToTop');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>
