@props([
    'text' => 'Book Now',
    'type' => 'primary', // primary, secondary, outline
    'size' => 'md', // sm, md, lg
    'customClass' => '',
    'icon' => 'bi-calendar-check',
    'route' => 'contact.booking.form',
    'params' => []
])

@php
    // Button styling based on type
    $buttonStyles = [
        'primary' => 'bg-[#8DD3BB] hover:bg-[#7bc0a9] text-gray-800',
        'secondary' => 'bg-black hover:bg-gray-800 text-white',
        'outline' => 'bg-transparent border-2 border-[#8DD3BB] hover:bg-[#8DD3BB]/10 text-gray-800'
    ];
    
    // Button sizing
    $buttonSizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg'
    ];
    
    $classes = $buttonStyles[$type] . ' ' . $buttonSizes[$size] . ' rounded font-medium transition-colors flex items-center justify-center ' . $customClass;
    
    // Check authentication status
    $isLoggedIn = auth()->check();
    
    // Determine the route
    if ($isLoggedIn) {
        $href = route($route, $params);
    } else {
        // If not logged in, redirect to login with return URL
        $redirectParams = ['redirect_to' => $route];
        if (!empty($params)) {
            $redirectParams['params'] = json_encode($params);
        }
        $href = route('login', $redirectParams);
    }
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    @if($icon)
        <i class="bi {{ $icon }} mr-2"></i>
    @endif
    {{ $text }}
</a>
