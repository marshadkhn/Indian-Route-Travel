<section class="bg-white py-10">
    <div class="container mx-auto max-w-6xl">
        <!-- Review Section Heading -->
        <h2 class="text-sm font-bold text-gray-500 text-center mb-2 uppercase">Reviews</h2>
        <h3 class="text-2xl font-semibold text-gray-800 text-center mb-1">What Our Customers Say</h3>
        <h1 class="text-4xl font-bold text-gray-900 text-center mb-8">Customer Reviews</h1>

        <!-- Two Vertical Marquees -->
        <div class="grid grid-cols-2 gap-6">
            <!-- Left Marquee (Top to Bottom) -->
            <x-marquee 
                type="review"
                direction="down"
                :reviews="[
                    ['text' => 'Amazing experience! Highly recommend.', 'name' => '- John Doe', 'location' => 'New York, USA'],
                    ['text' => 'The trip was beyond our expectations!', 'name' => '- Maria Garcia', 'location' => 'Madrid, Spain'],
                    ['text' => 'Perfectly organized from start to finish.', 'name' => '- Robert Johnson', 'location' => 'Toronto, Canada'],
                    ['text' => 'Will definitely book with them again.', 'name' => '- Priya Sharma', 'location' => 'Delhi, India'],
                    ['text' => 'Great value for money and excellent service.', 'name' => '- David Wilson', 'location' => 'Sydney, Australia']
                ]"
            />

            <!-- Right Marquee (Bottom to Top) -->
            <x-marquee 
                type="review"
                direction="up"
                :reviews="[
                    ['text' => 'The best travel service I\'ve ever used!', 'name' => '- Jane Smith', 'location' => 'London, UK'],
                    ['text' => 'Incredible destinations and knowledgeable guides.', 'name' => '- Hiroshi Tanaka', 'location' => 'Tokyo, Japan'],
                    ['text' => 'They made planning our honeymoon so easy.', 'name' => '- Sarah & Michael', 'location' => 'Paris, France'],
                    ['text' => 'Outstanding customer service and attention to detail.', 'name' => '- Ahmed Hassan', 'location' => 'Cairo, Egypt'],
                    ['text' => 'Loved every moment of our customized tour!', 'name' => '- Lisa Chen', 'location' => 'Singapore']
                ]"
            />
        </div>
    </div>
</section>

