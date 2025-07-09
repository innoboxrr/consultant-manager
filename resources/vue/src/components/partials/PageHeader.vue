<template>
    <div class="flex items-center justify-between border-b pb-4 mb-4 dark:border-gray-600">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ title }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400 text-sm">
                {{ description }}
            </p>
        </div>
        <button
            @click="$router.back()"
            class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            {{ __cm('Back') }}
        </button>
    </div>
</template>

<script>
    export default {
        name: 'PageHeader',
        props: {
            title: {
                type: String,
                required: true
            },
            description: {
                type: String,
                default: ''
            }
        }
    }
</script>