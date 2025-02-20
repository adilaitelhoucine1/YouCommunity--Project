<x-app-layout>
    <div class="min-h-screen bg-gray-50 flex">
        @include('dashboardLayounts.aside')

        <main class="flex-1 ml-72 p-8">
            <!-- Event Header -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="relative h-64">
                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30" 
                         alt="{{ $event->title }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4">
                        <span class="bg-green-500 text-white px-4 py-2 rounded-full">
                            {{ $event->status }}
                        </span>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $event->title }}</h1>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-500">Organisé par</span>
                            <span class="font-semibold text-gray-900">{{ $event->user->name }}</span>
                        </div>
                    </div>

                    <!-- Event Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-blue-50 rounded-lg">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Date et heure</p>
                                    <p class="font-medium text-gray-900">
                                        {{ $event->date}}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-purple-50 rounded-lg">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Lieu</p>
                                    <p class="font-medium text-gray-900">{{ $event->location }} - {{ $event->lieu }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-green-50 rounded-lg">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Participants maximum</p>
                                    <p class="font-medium text-gray-900">{{ $event->max_participants ?? 'Illimité' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Description</h3>
                            <p class="text-gray-600 whitespace-pre-line">{{ $event->description }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4 pt-6 border-t">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                            Retour
                        </a>
                       
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="mt-8 bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900">Commentaires</h2>
                </div>

                <!-- Add Comment Form -->
                <div class="p-6 border-b border-gray-100">
                    <div class="space-y-4">
                        <div>
                            <label for="comment" class="sr-only">Votre commentaire</label>
                            <textarea id="comment" rows="3" 
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Ajouter un commentaire..."></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                Publier
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Static Comments List -->
                <div class="divide-y divide-gray-100">
                    <!-- Comment 1 -->
                    <div class="p-6">
                        <div class="flex space-x-3">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center text-white font-semibold">
                                    J
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium text-gray-900">John Doe</h3>
                                    <p class="text-sm text-gray-500">Il y a 2 heures</p>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Super événement ! J'ai hâte d'y participer.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Comment 2 -->
                    <div class="p-6">
                        <div class="flex space-x-3">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-400 to-green-400 flex items-center justify-center text-white font-semibold">
                                    M
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium text-gray-900">Marie Martin</h3>
                                    <p class="text-sm text-gray-500">Il y a 1 jour</p>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Est-ce qu'il y a encore des places disponibles ?</p>
                                <div class="mt-2 flex items-center space-x-2">
                                    <button class="text-xs text-red-500 hover:text-red-600">
                                        Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment 3 -->
                    <div class="p-6">
                        <div class="flex space-x-3">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-yellow-400 to-red-400 flex items-center justify-center text-white font-semibold">
                                    L
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium text-gray-900">Lucas Bernard</h3>
                                    <p class="text-sm text-gray-500">Il y a 3 jours</p>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">L'événement de l'année dernière était génial, j'espère que celui-ci sera tout aussi bien !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
