<nav class="relative flex items-center justify-between p-4 bg-white text-black shadow-md" style="font-family: 'Montserrat', sans-serif;">
    <!-- Left: Hamburger Menu -->
    <div class="flex items-center">
        <button id="hamburgerButton" class="text-black focus:outline-none">
            <i class="bi bi-list h-8 w-8"></i> <!-- Bootstrap Icon for Hamburger (Solid Style) -->
        </button>
    </div>

    <!-- Middle: Logo -->
    <div>
        <a href="/">
            <img src="{{ asset('images/Main-Logo.png') }}" alt="Main Logo" class="h-16">
        </a>
    </div>

    <!-- Right: Login and Sign Up -->
    <div class="flex items-center gap-4">
        @guest
            <a href="{{ route('login') }}" class="text-black hover:underline">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-black hover:bg-gray-800 text-white rounded">Sign Up</a>
        @else
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                    <span>{{ Auth::user()->name }}</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin Dashboard</a>
                    @endif
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
    </div>

    <!-- Pop-up Menu -->
    <div id="popupMenu" class="absolute top-full left-0 w-64 bg-white shadow-md z-50 hidden">
        <ul class="flex flex-col p-4">
            <!-- Finds Stays -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-house-fill text-gray-500"></i>
                <a href="{{ route('findStays') }}" class="block">Find Stays</a>
            </li>

            <!-- Plan Tour -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-geo-alt-fill text-gray-500"></i>
                <a href="{{ route('planTour') }}" class="block">Plan Tour</a>
            </li>

            <!-- Car Rent -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-car-front-fill text-gray-500"></i>
                <a href="{{ route('carRent') }}" class="block">Car Rent</a>
            </li>

            <!-- Get a Guide -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-person-fill text-gray-500"></i>
                <a href="{{ route('getGuide') }}" class="block">Get a Guide</a>
            </li>

            <!-- Divider -->
            <hr class="my-2 border-gray-300">

            <!-- Explore -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-compass-fill text-gray-500"></i>
                <a href="#" class="block">Explore</a>
            </li>

            <!-- Combos and Offers -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-gift-fill text-gray-500"></i>
                <a href="#" class="block">Combos and Offers</a>
            </li>

            <!-- Share Your Experience -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-pencil-fill text-gray-500"></i>
                <a href="#" class="block">Share Your Experience</a>
            </li>

            <!-- Divider -->
            <hr class="my-2 border-gray-300">

            <!-- Get Help -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-question-circle-fill text-gray-500"></i>
                <a href="#" class="block">Get Help</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Add Alpine.js for dropdown functionality -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<!-- Hamburger Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerButton = document.getElementById('hamburgerButton');
        const popupMenu = document.getElementById('popupMenu');

        if (hamburgerButton && popupMenu) {
            // Toggle the visibility of the pop-up menu
            hamburgerButton.addEventListener('click', function() {
                popupMenu.classList.toggle('hidden');
            });
        } else {
            console.error('Hamburger button or popup menu not found');
        }
    });
</script>