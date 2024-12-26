@props(['question', 'answer'])

<div>
    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
        {{ $question }}
    </h3>
    <p class="mt-2 text-gray-600 dark:text-neutral-400">
        {{ $answer }}
    </p>
</div> 