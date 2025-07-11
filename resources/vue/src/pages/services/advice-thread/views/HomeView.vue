<template>
    <div class="relative flex flex-col items-center justify-center h-[60vh] bg-white dark:bg-gray-950 border border-gray-200 dark:border-gray-800 rounded-xl text-center px-6 sm:px-10 py-10 shadow-sm mx-10">
        <!-- Marca de agua suave -->
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
            <span class="text-5xl sm:text-6xl lg:text-7xl font-bold text-gray-100 dark:text-gray-800 opacity-20 select-none">
                {{ __cm('No thread selected') }}
            </span>
        </div>

        <!-- Contenido principal -->
        <div class="relative z-10 max-w-md w-full">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">
                {{ __cm('Select or create a thread') }}
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                {{ __cm('You can select an existing thread or create a new one to get started.') }}
            </p>

            <a
                href="#"
                class="inline-flex items-center justify-center gap-2 rounded-md bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium px-4 py-2 transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 hover:text-white"
            >
                <i class="fas fa-plus text-xs"></i>
                {{ __cm('Create new thread') }}
            </a>
        </div>
    </div>
</template>
