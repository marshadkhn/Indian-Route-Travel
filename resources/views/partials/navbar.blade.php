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
        <a href="/login" class="text-black hover:underline">Login</a>
        <a href="/register" class="px-4 py-2 bg-black hover:bg-gray-800 text-white rounded">Sign Up</a>
    </div>

    <!-- Pop-up Menu -->
    <div id="popupMenu" class="absolute top-full left-0 w-64 bg-white shadow-md z-50 hidden">
        <ul class="flex flex-col p-4">
            <!-- Finds Stays -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-house-fill text-gray-500"></i> <!-- Solid Bootstrap Icon -->
                <a href="{{ route('findStays') }}" class="block">Find Stays</a>
            </li>

            <!-- Plan Tour -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-geo-alt-fill text-gray-500"></i> <!-- Solid Bootstrap Icon -->
                <a href="{{ route('planTour') }}" class="block">Plan Tour</a>
            </li>

            <!-- Car Rent -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-car-front-fill text-gray-500"></i> <!-- Solid Bootstrap Icon -->
                <a href="#" class="block">Car Rent</a>
            </li>

            <!-- Get a Guide -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-person-fill text-gray-500"></i> <!-- Solid Bootstrap Icon -->
                <a href="#" class="block">Get a Guide</a>
            </li>

            <!-- Divider -->
            <hr class="my-2 border-gray-300">

            <!-- Explore -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-compass-fill text-gray-500"></i> <!-- Solid Bootstrap Icon -->
                <a href="#" class="block">Explore</a>
            </li>

            <!-- Combos and Offers -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-gift-fill text-gray-500"></i> <!-- Solid Bootstrap Icon -->
                <a href="#" class="block">Combos and Offers</a>
            </li>

            <!-- Share Your Experience -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-pencil-fill text-gray-500"></i> <!-- Solid Bootstrap Icon -->
                <a href="#" class="block">Share Your Experience</a>
            </li>

            <!-- Divider -->
            <hr class="my-2 border-gray-300">

            <!-- Get Help -->
            <li class="flex items-center gap-2 py-2 hover:bg-gray-100">
                <i class="bi bi-question-circle-fill text-gray-500"></i> <!-- Solid Bootstrap Icon -->
                <a href="#" class="block">Get Help</a>
            </li>
        </ul>
    </div>
</nav>

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