<x-app-layout>
    <div class="min-h-screen bg-gray-50 flex">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 w-72 bg-white shadow-sm z-50 transition-all duration-300">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 bg-gray-50">
                <div class="px-6 py-2">
                    <span class="text-2xl font-bold text-gray-700">
                        EventConnect
                    </span>
                </div>
            </div>
            
            <!-- User Profile -->
            <div class="px-6 py-6 border-b border-gray-100">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full overflow-hidden">
                            <img src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1176-1730909420.jpg" 
                                 alt="Profile Image" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white"></div>
                    </div>
                    <div>
                        <h3 class="text-gray-800 font-medium">{{ Auth::user()->name }}</h3>
                        <p class="text-gray-500 text-xs">Membre Premium</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-6 px-4">
                <div class="space-y-4">
                    <!-- Dashboard Link -->
                    <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:bg-gray-50 group transition-all duration-200">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-3">Tableau de bord</span>
                    </a>

                    <!-- Events Section -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Événements</p>
                        <div class="space-y-1">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:bg-gray-50 group transition-all duration-200">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="ml-3">Mes Événements</span>
                                <span class="ml-auto bg-blue-50 text-blue-600 text-xs font-medium px-2 py-1 rounded-md">3</span>
                            </a>
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:bg-gray-50 group transition-all duration-200">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="ml-3">Créer</span>
                            </a>
                        </div>
                    </div>

                    <!-- Actions Section -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</p>
                        <div class="space-y-1">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:bg-gray-50 group transition-all duration-200">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="ml-3">Participations</span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Premium Card -->
            <div class="px-4 mt-8">
                <div class="p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <p class="text-gray-600 font-medium text-sm">Premium Member</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-72 p-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Bonjour, {{ Auth::user()->name }} 👋</h1>
                <p class="text-gray-600 mt-1">Voici un aperçu de vos activités récentes</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Événements Créés</p>
                            <div class="flex items-end space-x-1 mt-2">
                                <h3 class="text-3xl font-bold text-gray-800">24</h3>
                                <span class="text-sm text-green-500 mb-1">+12%</span>
                            </div>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Participations Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-purple-100 p-6 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Participations</p>
                            <div class="flex items-end space-x-1 mt-2">
                                <h3 class="text-3xl font-bold text-purple-600">156</h3>
                                <span class="text-sm text-purple-500 mb-1">+8%</span>
                            </div>
                        </div>
                        <div class="p-3 bg-purple-50 rounded-xl group-hover:bg-purple-100 transition-colors">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Comments Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-fuchsia-100 p-6 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Commentaires</p>
                            <div class="flex items-end space-x-1 mt-2">
                                <h3 class="text-3xl font-bold text-fuchsia-600">89</h3>
                                <span class="text-sm text-fuchsia-500 mb-1">+24%</span>
                            </div>
                        </div>
                        <div class="p-3 bg-fuchsia-50 rounded-xl group-hover:bg-fuchsia-100 transition-colors">
                            <svg class="w-8 h-8 text-fuchsia-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-violet-100 p-6 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">À Venir</p>
                            <div class="flex items-end space-x-1 mt-2">
                                <h3 class="text-3xl font-bold text-violet-600">12</h3>
                                <span class="text-sm text-violet-500 mb-1">Cette semaine</span>
                            </div>
                        </div>
                        <div class="p-3 bg-violet-50 rounded-xl group-hover:bg-violet-100 transition-colors">
                            <svg class="w-8 h-8 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Actions Rapides</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <button onclick="openEventModal()" class="flex items-center justify-center space-x-2 bg-blue-500 text-white p-4 rounded-lg hover:bg-blue-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Créer un Événement</span>
                    </button>
                    <button class="flex items-center justify-center space-x-2 bg-purple-500 text-white p-4 rounded-xl hover:bg-purple-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span>Découvrir des Événements</span>
                    </button>
                    <button class="flex items-center justify-center space-x-2 bg-violet-500 text-white p-4 rounded-xl hover:bg-violet-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Gérer mes Participations</span>
                    </button>
                </div>
            </div>

            <!-- Activity & Events Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800">Activité Récente</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <!-- Activity Item -->
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Nouvel événement créé</p>
                                    <p class="text-sm text-gray-500">Soirée Jazz au Sunset Club</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 2 heures</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                        Nouveau
                                    </span>
                                </div>
                            </div>

                            <!-- More Activity Items -->
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 rounded-full bg-fuchsia-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-fuchsia-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Nouveau commentaire</p>
                                    <p class="text-sm text-gray-500">Marie a commenté sur "Concert au Parc"</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 4 heures</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800">Événements à Venir</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <!-- Event Item -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-pink-400 to-purple-400 flex flex-col items-center justify-center text-white">
                                        <span class="text-sm font-bold">MAR</span>
                                        <span class="text-xl font-bold">15</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Festival de Musique</p>
                                    <p class="text-sm text-gray-500">Parc Central, 18:00</p>
                                    <div class="flex items-center mt-1">
                                        <div class="flex -space-x-2">
                                            <div class="w-6 h-6 rounded-full bg-pink-400 border-2 border-white"></div>
                                            <div class="w-6 h-6 rounded-full bg-purple-400 border-2 border-white"></div>
                                            <div class="w-6 h-6 rounded-full bg-fuchsia-400 border-2 border-white"></div>
                                        </div>
                                        <span class="text-xs text-gray-500 ml-2">+42 participants</span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <button class="px-3 py-1 text-pink-600 border border-pink-200 rounded-lg hover:bg-pink-50">
                                        Voir
                                    </button>
                                </div>
                            </div>

                            <!-- More Event Items -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-purple-400 to-pink-400 flex flex-col items-center justify-center text-white">
                                        <span class="text-sm font-bold">MAR</span>
                                        <span class="text-xl font-bold">18</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Soirée Jazz</p>
                                    <p class="text-sm text-gray-500">Le Club, 20:30</p>
                                    <div class="flex items-center mt-1">
                                        <div class="flex -space-x-2">
                                            <div class="w-6 h-6 rounded-full bg-pink-400 border-2 border-white"></div>
                                            <div class="w-6 h-6 rounded-full bg-purple-400 border-2 border-white"></div>
                                        </div>
                                        <span class="text-xs text-gray-500 ml-2">+12 participants</span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <button class="px-3 py-1 text-pink-600 border border-pink-200 rounded-lg hover:bg-pink-50">
                                        Voir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Event Creation Modal -->
    <div id="eventModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Créer un Événement</h3>
                <form action="/addevent" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Titre</label>
                        <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="datetime-local" name="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Lieu</label>
                        <input type="text" name="location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="closeEventModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Créer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openEventModal() {
            document.getElementById('eventModal').classList.remove('hidden');
        }
        
        function closeEventModal() {
            document.getElementById('eventModal').classList.add('hidden');
        }
    </script>
</x-app-layout>