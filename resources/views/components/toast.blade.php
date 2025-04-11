@props([
    'message' => '',
    'type' => 'info', // info, success, warning, error
    'show' => false
])

@php
    $backgrounds = [
        'info' => 'bg-blue-50',
        'success' => 'bg-green-50',
        'warning' => 'bg-yellow-50',
        'error' => 'bg-red-50'
    ];
    
    $textColors = [
        'info' => 'text-blue-800',
        'success' => 'text-green-800',
        'warning' => 'text-yellow-800',
        'error' => 'text-red-800'
    ];
    
    $borderColors = [
        'info' => 'border-blue-300',
        'success' => 'border-green-300',
        'warning' => 'border-yellow-300',
        'error' => 'border-red-300'
    ];
    
    $icons = [
        'info' => 'bi-info-circle-fill',
        'success' => 'bi-check-circle-fill',
        'warning' => 'bi-exclamation-triangle-fill',
        'error' => 'bi-x-circle-fill'
    ];
@endphp

<div 
    x-data="{ show: {{ $show ? 'true' : 'false' }} }"
    x-init="setTimeout(() => { show = true }, 100); setTimeout(() => { show = false }, 5000)"
    x-show="show"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-16 right-4 z-50 max-w-sm w-full shadow-lg rounded-lg pointer-events-auto border {{ $borderColors[$type] }} {{ $backgrounds[$type] }}"
>
    <div class="rounded-lg shadow-xs overflow-hidden">
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="bi {{ $icons[$type] }} {{ $textColors[$type] }} text-lg"></i>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm leading-5 font-medium {{ $textColors[$type] }}">
                        {{ $message }}
                    </p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button @click="show = false" class="inline-flex {{ $textColors[$type] }} focus:outline-none">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
