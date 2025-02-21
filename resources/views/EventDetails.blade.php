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
                        <!-- Bouton Réserver -->
                        <form action="{{ route('events.AddReservation') }}" method="POST">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <button type="submit" 
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Réserver ma place</span>
                                </div>
                            </button>
                        </form>

                        <!-- Bouton Retour -->
                        <a href="{{ route('dashboard') }}" 
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                            Retour
                        </a>
                    </div>
                </div>
            </div>

            <!-- Messages Flash -->
            @if(session('success'))
                <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg" 
                     x-data="{ show: true }" 
                     x-show="show" 
                     x-init="setTimeout(() => show = false, 3000)">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg"
                     x-data="{ show: true }" 
                     x-show="show" 
                     x-init="setTimeout(() => show = false, 3000)">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Comments Section -->
            <div class="mt-8 bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900">Commentaires</h2>
                </div>

                <!-- Add Comment Form -->
                <div class="p-6 border-b border-gray-100">
                    <form class="space-y-4" action="{{ route('comment.add') }}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <div>
                            <label for="comment" class="sr-only">Votre commentaire</label>
                            <textarea id="comment" name="comment" rows="3"
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Ajouter un commentaire..." required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                Publier
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Comments List -->
                <div class="divide-y divide-gray-100">
                    @foreach($comments as $comment)
                    
                        <div class="p-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                            <div class="flex space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold shadow-lg">
                                          <img src="data:image/png;base64,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" 
                                 alt="Profile Image" 
                                 class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium text-gray-900">{{ $comment->user->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">{{ $comment->contenu }}</p>
                                    @if(auth()->id() === $comment->user_id)
                                        <div class="mt-2 flex items-center space-x-2">
                                            <form action="{{ route('comment.delete', $comment->id_comment) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="inline-flex items-center px-3 py-1 border border-red-300 text-sm leading-5 font-medium rounded-full text-red-500 hover:text-red-600 hover:border-red-400 hover:bg-red-50 focus:outline-none focus:border-red-400 focus:shadow-outline-red active:bg-red-50 transition ease-in-out duration-150"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">
                                                    <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

           
        </main>
    </div>
</x-app-layout>
