<section class="bg-white py-10">
    <div class="container mx-auto max-w-4xl bg-white p-8 rounded-lg shadow-md" style="font-family: 'Montserrat', sans-serif;">
        <!-- FAQ Header -->
        <h2 class="text-sm font-bold text-gray-500 text-center mb-2 uppercase">FAQ</h2>
        <h3 class="text-2xl font-semibold text-gray-800 text-center mb-1">Answer to your</h3>
        <h1 class="text-4xl font-bold text-gray-900 text-center mb-8">Common Questions</h1>

        <!-- FAQ Items -->
        <div class="space-y-4">
            @php
            $faqs = json_decode(file_get_contents(resource_path('js/data/faq.json')), true);
            @endphp

            @foreach ($faqs as $faq)
            <div class="border border-gray-200 rounded-lg bg-white overflow-hidden">
                <button class="w-full text-left px-4 py-3 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 flex justify-between items-center"
                    onclick="toggleFaq(this)">
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $faq['question'] }}
                    </h3>
                    <span class="text-gray-600 transform transition-transform duration-300">+</span>
                </button>
                <div class="hidden px-4 py-3 bg-white text-gray-600">
                    {{ $faq['answer'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('span');
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.textContent = '-'; // Change to minus when open
        } else {
            content.classList.add('hidden');
            icon.textContent = '+'; // Change back to plus when closed
        }
    }
</script>