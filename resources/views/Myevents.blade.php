<x-app-layout>
    <div class="min-h-screen bg-gray-50 flex">
          @include('dashboardLayounts.aside');

        <!-- Main Content -->
        <main class="flex-1 ml-72 p-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Mes Événements</h1>
                <p class="text-gray-600 mt-1">Gérez vos événements créés</p>
            </div>

            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($events as $event)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30" 
                                 alt="Event" 
                                 class="w-full h-48 object-cover rounded-t-lg">
                            <div class="absolute top-4 right-4">
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">Actif</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-purple-400 to-pink-400 flex flex-col items-center justify-center text-white">
                                        <span class="text-xs font-bold">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                                        <span class="text-lg font-bold">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $event->title }}</h3>
                                        <p class="text-sm text-gray-500">{{ $event->location }}</p>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">{{ $event->description }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="flex -space-x-2">
                                        <div class="w-6 h-6 rounded-full bg-blue-400 border-2 border-white"></div>
                                        <div class="w-6 h-6 rounded-full bg-green-400 border-2 border-white"></div>
                                        <div class="w-6 h-6 rounded-full bg-purple-400 border-2 border-white"></div>
                                    </div>
                                    <span class="text-sm text-gray-500">+42 participants</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('events.edit', $event->id) }}" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('events.delete', $event->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">Vous n'avez pas encore créé d'événements.</p>
                        <button onclick="openEventModal()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                            Créer mon premier événement
                        </button>
                    </div>
                @endforelse
            </div>
        </main>
    </div>
</x-app-layout>
