<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 flex">
        @include('dashboardLayounts.aside')

        <main class="flex-1 ml-72 p-8">
            <!-- Header Section with animated gradient -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold relative inline-block">
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Mes Réservations
                    </span>
                    <div class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                </h1>
            </div>

            <!-- Reservations List -->
            <div class="space-y-4">
                @forelse($reservations as $reservation)
                    <div class="group bg-white backdrop-blur-sm bg-opacity-80 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
                        <div class="p-5">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                               

                                <!-- Event Info -->
                                <div class="flex-1 space-y-3">
                                    <h2 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">
                                        {{ $reservation->event->title }}
                                    </h2>

                                    <div class="flex flex-wrap gap-4">
                                        <div class="flex items-center bg-blue-50 rounded-lg px-3 py-2">
                                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-blue-700">
                                                {{ \Carbon\Carbon::parse($reservation->event->date)->format('d/m/Y H:i') }}
                                            </span>
                                        </div>
                                        <div class="flex items-center bg-purple-50 rounded-lg px-3 py-2">
                                            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span class="text-purple-700">
                                                {{ $reservation->event->location }} - {{ $reservation->event->lieu }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('events.showDetails', $reservation->event->id) }}" 
                                        class="group/btn inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-sm hover:shadow">
                                        <svg class="w-5 h-5 mr-2 group-hover/btn:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Voir
                                    </a>
                                    
                                        <form action="{{ route('reservation.cancel', $reservation->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="group/cancel inline-flex items-center px-4 py-2 border-2 border-red-200 text-red-500 rounded-lg hover:bg-red-50 hover:border-red-300 transition-all duration-300"
                                                onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')">
                                                <svg class="w-5 h-5 mr-2 group-hover/cancel:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Annuler
                                            </button>
                                        </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="relative overflow-hidden bg-white rounded-xl shadow-sm p-8">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 opacity-50"></div>
                        <div class="relative text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-blue-100 to-purple-100 mb-4">
                                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Aucune réservation</h3>
                            <p class="text-gray-500">Vous n'avez pas encore de réservations.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if(session('success'))
                <div class="fixed bottom-4 right-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-3 rounded-lg shadow-lg" 
                     x-data="{ show: true }" 
                     x-show="show" 
                     x-init="setTimeout(() => show = false, 3000)">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="fixed bottom-4 right-4 bg-gradient-to-r from-red-500 to-rose-500 text-white px-6 py-3 rounded-lg shadow-lg"
                     x-data="{ show: true }" 
                     x-show="show" 
                     x-init="setTimeout(() => show = false, 3000)">
                    {{ session('error') }}
                </div>
            @endif
        </main>
    </div>
</x-app-layout>
