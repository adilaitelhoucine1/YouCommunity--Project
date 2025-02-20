<x-app-layout>
    <div class="min-h-screen bg-gray-50 flex">
        <!-- Sidebar -->
        @include('dashboardLayounts.aside');


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
                            @forelse ($events as $event)
                                @if($event->status === 'A venir')
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-pink-400 to-purple-400 flex flex-col items-center justify-center text-white">
                                                <span class="text-sm font-bold">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                                                <span class="text-xl font-bold">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900">{{ $event->title }}</p>
                                            <p class="text-sm text-gray-500">{{ $event->location }} - {{ $event->lieu }}</p>
                                            <div class="flex items-center mt-1">
                                                @if($event->max_participants)
                                                    <span class="text-xs text-gray-500">Max: {{ $event->max_participants }} participants</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <button class="px-3 py-1 text-pink-600 border border-pink-200 rounded-lg hover:bg-pink-50">
                                                Voir
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <p class="text-gray-500 text-center">Aucun événement à venir</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Past Events -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800">Événements Passés</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            @forelse ($events as $event)
                                @if($event->status === 'Passé')
                                    <div class="flex items-center space-x-4 opacity-75">
                                        <div class="flex-shrink-0">
                                            <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-gray-400 to-gray-500 flex flex-col items-center justify-center text-white">
                                                <span class="text-sm font-bold">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                                                <span class="text-xl font-bold">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900">{{ $event->title }}</p>
                                            <p class="text-sm text-gray-500">{{ $event->location }} - {{ $event->lieu }}</p>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <p class="text-gray-500 text-center">Aucun événement passé</p>
                            @endforelse
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
                        <input type="text" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" required rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="datetime-local" name="date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" name="location" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Lieu</label>
                        <input type="text" name="lieu" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre maximum de participants</label>
                        <input type="number" name="max_participants" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
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