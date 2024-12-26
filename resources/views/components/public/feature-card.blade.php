@props(['title', 'description', 'icon'])

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl text-center shadow-lg hover:shadow-2xl transition-all duration-300">
    <div class="mb-4 flex justify-center">
        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
            {!! $icon !!}
        </div>
    </div>
    <h3 class="text-xl font-semibold mb-4">{{ $title }}</h3>
    <p class="text-gray-600 dark:text-gray-300">{{ $description }}</p>
</div> 