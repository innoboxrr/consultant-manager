<template>
    <!-- Vista provicional indicando que estamos construyendo el dashboard-->
    <div class="mt-12 inset-0 bg-gray-100 dark:bg-gray-900 z-50 flex items-center justify-center">
        <div class="w-full max-w-2xl mx-auto p-8 rounded-3xl shadow-2xl bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 relative">
            <div class="absolute top-0 left-0 w-full h-12 bg-gradient-to-r from-gray-200 to-gray-100 dark:from-gray-700 dark:to-gray-800 rounded-t-3xl border-b border-gray-300 dark:border-gray-700 flex items-center px-4 space-x-2">
                <!-- Simulación de botones de navegador -->
                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                <div class="w-3 h-3 rounded-full bg-yellow-200"></div>
                <div class="w-3 h-3 rounded-full bg-green-400"></div>
            </div>
            <div class="mt-16 text-center space-y-4">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    🚧 Dashboard en construcción
                </h1>
                <p class="text-gray-600 dark:text-gray-300">
                    Estamos trabajando para brindarte una experiencia visual y funcional completa.
                </p>
                <div class="flex justify-center items-center space-x-2 py-4">
                    <div class="w-4 h-4 bg-blue-500 rounded-full animate-bounce"></div>
                    <div class="w-4 h-4 bg-indigo-500 rounded-full animate-bounce [animation-delay:.15s]"></div>
                    <div class="w-4 h-4 bg-purple-500 rounded-full animate-bounce [animation-delay:.3s]"></div>
                </div>
                <p class="text-gray-600 dark:text-gray-300">
                    Ya puedes comenzar a explorar los datos y funcionalidades básicas, pero ten en cuenta que algunas secciones aún están en desarrollo.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UnderConstruction",
};
</script>