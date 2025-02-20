<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Evently - Événements Communautaires</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- GSAP for animations -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        
        <!-- Three.js for 3D animations -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.158.0/three.min.js"></script>
        
        <!-- Particles.js for background effects -->
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .gradient-text {
                background: linear-gradient(45deg, #3b82f6, #8b5cf6, #d946ef);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
                animation: gradient 5s ease infinite;
                background-size: 200% 200%;
            }

            @keyframes gradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            .floating {
                animation: floating 3s ease-in-out infinite;
            }

            @keyframes floating {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
                100% { transform: translateY(0px); }
            }

            .card-hover {
                transition: all 0.3s ease;
                background: rgba(255, 255, 255, 0.8);
                border: 1px solid rgba(59, 130, 246, 0.2);
            }

            .card-hover:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(59, 130, 246, 0.1);
                border-color: rgba(59, 130, 246, 0.5);
            }

            .glass {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            }

            .nav-link {
                position: relative;
                color: white;
                padding: 0.5rem 1rem;
                transition: all 0.3s ease;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                width: 0;
                height: 2px;
                bottom: 0;
                left: 0;
                background: linear-gradient(45deg, #3b82f6, #8b5cf6);
                transition: width 0.3s ease;
            }

            .nav-link:hover::after {
                width: 100%;
            }

            .auth-button {
                background: linear-gradient(45deg, #3b82f6, #8b5cf6);
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 9999px;
                font-weight: 600;
                transition: all 0.3s ease;
                border: none;
                position: relative;
                overflow: hidden;
            }

            .auth-button::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(45deg, #8b5cf6, #d946ef);
                transition: all 0.5s ease;
            }

            .auth-button:hover::before {
                left: 0;
            }

            .auth-button span {
                position: relative;
                z-index: 1;
            }
        </style>
    </head>
    <body class="antialiased">
        <!-- Background Animation Container -->
        <div id="particles-js" class="fixed inset-0 z-0"></div>

        <!-- Content -->
        <div class="relative min-h-screen bg-gradient-to-b from-black/50 to-black/80">
            <!-- Navigation -->
            <nav class="relative z-10 px-6 py-4 bg-black/20 backdrop-blur-lg">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="text-2xl font-bold text-white flex items-center space-x-2">
                        <a href="{{ route('welcome') }}" class="flex items-center space-x-2">
                            <span class="text-4xl">🎉</span>
                            <span class="gradient-text">Evently</span>
                        </a>
                    </div>

                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#features" class="nav-link">Fonctionnalités</a>
                        <a href="#" class="nav-link">Événements</a>
                        <a href="#" class="nav-link">À propos</a>
                        <a href="#" class="nav-link">Contact</a>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="auth-button">
                                        <span>Déconnexion</span>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">Connexion</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="auth-button">
                                        <span>Inscription</span>
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden fixed top-4 right-4 z-20">
                <button class="text-white p-2" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden fixed inset-0 z-10 bg-black/95 backdrop-blur-lg">
                <div class="flex flex-col items-center justify-center h-full space-y-8">
                    <a href="#features" class="nav-link text-xl">Fonctionnalités</a>
                    <a href="#" class="nav-link text-xl">Événements</a>
                    <a href="#" class="nav-link text-xl">À propos</a>
                    <a href="#" class="nav-link text-xl">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="nav-link text-xl">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="auth-button text-xl">
                                    <span>Déconnexion</span>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-link text-xl">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="auth-button text-xl">
                                    <span>Inscription</span>
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <!-- Hero Section -->
            <main class="relative z-10">
                <div class="container mx-auto px-6 py-32 text-center">
                    <div class="floating">
                        <h1 class="text-6xl md:text-8xl font-bold text-white mb-8">
                            Découvrez des<br>
                            <span class="gradient-text">Événements Uniques</span>
                        </h1>
                    </div>
                    <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto opacity-0" id="hero-description">
                        Rejoignez une communauté passionnée et participez à des événements 
                        qui vous ressemblent. Créez, partagez, connectez.
                    </p>
                    <div class="flex justify-center gap-6">
                        <a href="#" class="group relative px-8 py-4 bg-[#FF2D20] text-white rounded-full overflow-hidden">
                            <span class="relative z-10 text-lg font-semibold">Commencer l'aventure</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-[#FF2D20] to-[#FF6B6B] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        </a>
                        <a href="#features" class="group px-8 py-4 bg-white/10 backdrop-blur-sm text-white rounded-full text-lg font-semibold hover:bg-white/20 transition-all">
                            Explorer
                        </a>
                    </div>
                </div>

                <!-- Features Section -->
                <div id="features" class="py-32">
                    <div class="container mx-auto px-6">
                        <div class="grid md:grid-cols-3 gap-12">
                            <div class="card-hover bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center">
                                <div class="bg-gradient-to-br from-[#FF2D20] to-[#FF6B6B] w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-4">Communauté Active</h3>
                                <p class="text-gray-300">Rejoignez une communauté dynamique et participez à des événements enrichissants.</p>
                            </div>
                            
                            <div class="card-hover bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center">
                                <div class="bg-gradient-to-br from-[#FF2D20] to-[#FF6B6B] w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-4">Événements Locaux</h3>
                                <p class="text-gray-300">Trouvez facilement des événements près de chez vous grâce à la géolocalisation.</p>
                            </div>

                            <div class="card-hover bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center">
                                <div class="bg-gradient-to-br from-[#FF2D20] to-[#FF6B6B] w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-4">Gestion Simple</h3>
                                <p class="text-gray-300">Créez et gérez vos événements en toute simplicité.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Animation Scripts -->
        <script>
            particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 100,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": ["#3b82f6", "#8b5cf6", "#d946ef", "#60a5fa"]
                    },
                    "shape": {
                        "type": ["circle", "triangle"],
                        "stroke": {
                            "width": 2,
                            "color": "#3b82f6"
                        }
                    },
                    "opacity": {
                        "value": 0.6,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 3,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 4,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 5,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#3b82f6",
                        "opacity": 0.4,
                        "width": 1,
                        "shadow": {
                            "enable": true,
                            "color": "#3b82f6",
                            "blur": 5
                        }
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": true,
                        "straight": false,
                        "out_mode": "bounce",
                        "bounce": true,
                        "attract": {
                            "enable": true,
                            "rotateX": 1200,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "window",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": ["grab", "bubble", "repulse"]
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 200,
                            "line_linked": {
                                "opacity": 0.8,
                                "color": "#3b82f6"
                            }
                        },
                        "bubble": {
                            "distance": 300,
                            "size": 12,
                            "duration": 2,
                            "opacity": 0.8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 150,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 6
                        }
                    }
                },
                "retina_detect": true
            });

            // Animation dynamique des particules
            let angle = 0;
            setInterval(() => {
                angle += 0.02;
                const particles = pJS.particles.array;
                particles.forEach((particle, i) => {
                    particle.radius = particle.radius_initial * (1 + 0.2 * Math.sin(angle + i));
                    
                    if (particle.attracted) {
                        particle.x += Math.cos(angle) * 0.2;
                        particle.y += Math.sin(angle) * 0.2;
                    }
                });
                pJS.fn.particlesRefresh();
            }, 50);

            // Interaction souris
            document.addEventListener('mousemove', (e) => {
                const mouseX = e.clientX;
                const mouseY = e.clientY;
                
                pJS.particles.array.forEach((particle) => {
                    const dx = mouseX - particle.x;
                    const dy = mouseY - particle.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    
                    if (dist < 200) {
                        particle.attracted = true;
                        const force = (200 - dist) / 200;
                        particle.vx += dx * force * 0.01;
                        particle.vy += dy * force * 0.01;
                    } else {
                        particle.attracted = false;
                    }
                });
            });

            // GSAP Animations
            gsap.from("#hero-description", {
                opacity: 0,
                y: 50,
                duration: 1,
                delay: 0.5
            });

            // Animate features on scroll
            const features = document.querySelectorAll('.card-hover');
            features.forEach((feature, index) => {
                gsap.from(feature, {
                    opacity: 0,
                    y: 100,
                    duration: 0.8,
                    delay: index * 0.2,
                    scrollTrigger: {
                        trigger: feature,
                        start: "top bottom-=100",
                        end: "top center",
                        toggleActions: "play none none reverse"
                    }
                });
            });

            function toggleMobileMenu() {
                const menu = document.getElementById('mobileMenu');
                menu.classList.toggle('hidden');
            }
        </script>
    </body>
</html>
