<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EventConnect - Découvrez des Événements Locaux</title>
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .bg-soft {
                background: linear-gradient(135deg, #fdf2f8 0%, #ede9fe 50%, #dbeafe 100%);
            }

            .nav-link {
                @apply text-gray-600 relative overflow-hidden;
            }

            .nav-link::after {
                content: '';
                @apply absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-pink-400 to-purple-400 
                       transform scale-x-0 transition-transform duration-300;
            }

            .nav-link:hover::after {
                transform: scaleX(1);
            }

            .fancy-button {
                @apply px-8 py-4 rounded-2xl font-medium relative overflow-hidden transition-all duration-300;
                background: linear-gradient(135deg, #ec4899, #8b5cf6);
                color: white;
                box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
            }

            .fancy-button::before {
                content: '';
                @apply absolute inset-0 opacity-0 transition-opacity duration-300;
                background: linear-gradient(135deg, #8b5cf6, #ec4899);
            }

            .fancy-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(236, 72, 153, 0.4);
            }

            .fancy-button:hover::before {
                opacity: 1;
            }

            .fancy-button span {
                @apply relative z-10;
            }

            .outline-button {
                @apply px-8 py-4 rounded-2xl font-medium border-2 transition-all duration-300
                       bg-white/50 backdrop-blur-sm;
                border-image: linear-gradient(135deg, #ec4899, #8b5cf6) 1;
            }

            .outline-button:hover {
                @apply text-white;
                background: linear-gradient(135deg, #ec4899, #8b5cf6);
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(236, 72, 153, 0.2);
            }

            .cute-card {
                @apply bg-white/70 backdrop-blur-sm rounded-3xl p-8 transition-all duration-300;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            }

            .cute-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 30px rgba(236, 72, 153, 0.15);
            }

            .emoji-bg {
                @apply w-16 h-16 rounded-2xl flex items-center justify-center mb-6 transition-all duration-300;
                background: linear-gradient(135deg, #fdf2f8, #ede9fe);
            }

            .cute-card:hover .emoji-bg {
                transform: scale(1.1) rotate(5deg);
            }

            .input-fancy {
                @apply px-6 py-4 rounded-2xl border-2 w-full transition-all duration-300
                       focus:outline-none focus:border-pink-400 focus:ring-4 focus:ring-pink-100;
            }

            .floating-shapes {
                position: absolute;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: 0;
            }

            .shape {
                position: absolute;
                background: linear-gradient(135deg, rgba(236, 72, 153, 0.1), rgba(139, 92, 246, 0.1));
                border-radius: 50%;
                animation: float 20s infinite linear;
            }

            @keyframes float {
                0% { transform: translate(0, 0) rotate(0deg); }
                100% { transform: translate(100px, 100px) rotate(360deg); }
            }
        </style>
    </head>
    <body class="bg-soft min-h-screen relative">
        <!-- Floating Shapes Background -->
        <div class="floating-shapes">
            <div class="shape w-64 h-64 top-20 -left-20"></div>
            <div class="shape w-96 h-96 top-40 right-0"></div>
            <div class="shape w-72 h-72 bottom-0 left-1/4"></div>
        </div>

        <!-- Navigation -->
        <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-pink-100">
            <div class="max-w-6xl mx-auto px-6">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <a href="/" class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-r from-pink-400 to-purple-400 
                                      flex items-center justify-center shadow-lg">
                                <span class="text-2xl">✨</span>
                            </div>
                            <span class="text-xl font-bold bg-gradient-to-r from-pink-500 to-purple-500 
                                       bg-clip-text text-transparent">EventConnect</span>
                        </a>
                    </div>

                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#events" class="nav-link">Événements</a>
                        <a href="#features" class="nav-link">Découvrir</a>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="fancy-button">
                                    <span>Dashboard</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">Connexion</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-link">
                                        <span>Rejoindre</span>
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative pt-32 pb-20">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <span class="text-3xl mb-6 block animate-bounce">✨</span>
                <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6">
                    Créez des moments
                    <span class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
                        magiques
                    </span>
                </h1>
                <p class="text-xl text-gray-600 mb-12 max-w-2xl mx-auto">
                    Découvrez des événements uniques et rencontrez 
                    des personnes extraordinaires
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="#events" class="fancy-button">
                        <span>Explorer les événements</span>
                    </a>
                    <a href="{{ route('register') }}" class="outline-button">
                        Créer un événement
                    </a>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="py-20 relative" id="features">
            <div class="max-w-6xl mx-auto px-6">
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="cute-card">
                        <div class="emoji-bg">
                            <span class="text-3xl">🎉</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">
                            Découvrez
                        </h3>
                        <p class="text-gray-600">
                            Trouvez des événements qui vous ressemblent
                        </p>
                    </div>
                    <div class="cute-card">
                        <div class="emoji-bg">
                            <span class="text-3xl">🤝</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">
                            Connectez
                        </h3>
                        <p class="text-gray-600">
                            Rencontrez des personnes passionnantes
                        </p>
                    </div>
                    <div class="cute-card">
                        <div class="emoji-bg">
                            <span class="text-3xl">💫</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">
                            Partagez
                        </h3>
                        <p class="text-gray-600">
                            Créez des souvenirs inoubliables
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 bg-white/70 backdrop-blur-sm border-t border-pink-100">
            <div class="max-w-6xl mx-auto px-6">
                <div class="grid md:grid-cols-3 gap-8">
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-pink-400 to-purple-400 
                                      flex items-center justify-center">
                                <span class="text-xl">✨</span>
                            </div>
                            <span class="text-lg font-bold bg-gradient-to-r from-pink-500 to-purple-500 
                                       bg-clip-text text-transparent">EventConnect</span>
                        </div>
                        <p class="text-gray-600">
                            Connectez-vous avec votre communauté
                        </p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800 mb-4">Liens</h4>
                        <div class="space-y-2">
                            <a href="#" class="block text-gray-600 hover:text-pink-500 transition-colors">
                                Événements
                            </a>
                            <a href="#" class="block text-gray-600 hover:text-pink-500 transition-colors">
                                À propos
                            </a>
                            <a href="#" class="block text-gray-600 hover:text-pink-500 transition-colors">
                                Contact
                            </a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800 mb-4">Newsletter</h4>
                        <form class="space-y-4">
                            <input type="email" 
                                   placeholder="Votre email" 
                                   class="input-fancy">
                            <button type="submit" class="fancy-button w-full">
                                <span>S'inscrire</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
