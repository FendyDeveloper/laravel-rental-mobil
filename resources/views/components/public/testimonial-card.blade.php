@props(['name', 'image', 'rating', 'content'])

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300">
    <div class="flex items-center mb-4">
        <img src="{{ $image }}" alt="{{ $name }}" class="w-16 h-16 rounded-full mr-4">
        <div>
            <h3 class="font-semibold">{{ $name }}</h3>
            <div class="flex text-yellow-400">
                @for ($i = 0; $i < $rating; $i++)
                    <span>★</span>
                @endfor
                @for ($i = $rating; $i < 5; $i++)
                    <span class="text-gray-300">★</span>
                @endfor
            </div>
        </div>
    </div>
    <p class="text-gray-600 dark:text-gray-300">"{{ $content }}"</p>
</div> 