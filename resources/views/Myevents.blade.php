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
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-l">{{$event->status}}</span>
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
                                    <button onclick="openEditModal({{ $event }})" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </button>
                                    
                                    <!-- Status Toggle Button -->
                                    <form action="{{ route('events.change-status', $event->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="p-2 {{ $event->status === 'A venir' ? 'text-green-500 hover:bg-green-50' : 'text-gray-500 hover:bg-gray-50' }} rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>
                                    </form>

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

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Modifier l'événement</h3>
                <form id="editEventForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_title">
                            Titre
                        </label>
                        <input type="text" id="edit_title" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_description">
                            Description
                        </label>
                        <textarea id="edit_description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_location">
                            Lieu
                        </label>
                        <input type="text" id="edit_location" name="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_date">
                            Date
                        </label>
                        <input type="datetime-local" id="edit_date" name="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Sauvegarder
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(event) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('edit_title').value = event.title;
            document.getElementById('edit_description').value = event.description;
            document.getElementById('edit_location').value = event.location;
            document.getElementById('edit_date').value = event.date.slice(0, 16);
            document.getElementById('editEventForm').action = `/events/${event.id}`;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });
    </script>
</x-app-layout>
