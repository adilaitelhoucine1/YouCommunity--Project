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
                    <a href="/dashboard" class="flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:bg-gray-50 group transition-all duration-200">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-3">Tableau de bord</span>
                    </a>

                    <!-- Events Section -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Événements</p>
                        <div class="space-y-1">
                            <a href="/ShowMyEvents" class="flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:bg-gray-50 group transition-all duration-200">
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
                            <a href="{{ route('reservations.index') }}" 
                                class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg {{ request()->routeIs('reservations.index') ? 'bg-gray-100' : '' }}">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Mes Réservations
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