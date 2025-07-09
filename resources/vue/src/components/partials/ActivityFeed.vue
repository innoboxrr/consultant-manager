<template>
    <aside 
        :class="{
            'lg:w-80': !isCollapsed, 
            'lg:w-16': isCollapsed, 
            'w-full': isMobile, 
            'hidden lg:block': !dataLoaded
        }" 
        class="transition-all duration-300 h-full overflow-y-auto bg-gray-50 border-l border-gray-200">
        
        <!-- Header -->
        <header class="flex items-center justify-between border-b border-gray-200 px-4 py-4 sm:px-6 sm:py-6 lg:px-8">
            <h2 v-if="!isCollapsed && !isMobile" class="text-base font-semibold text-gray-900">
                {{ __cm('Activity') }}
            </h2>
            <button @click="toggleCollapse" class="lg:hidden text-gray-600">
                <span v-if="isCollapsed">☰</span> <!-- Icon for opening -->
                <span v-else>×</span> <!-- Icon for closing -->
            </button>
            <a v-if="!isMobile" href="#" class="text-sm font-semibold text-blue-600">
                {{ __cm('More') }}
                <span class="text-gray-400" aria-hidden="true">&rarr;</span>
            </a>
        </header>

        <!-- List of Activities -->
        <ul role="list" class="divide-y divide-gray-200">
            <li v-for="item in activityItems" :key="item.dateTime" class="px-4 py-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-x-3">
                    <img :src="item.user.imageUrl" alt="" class="h-6 w-6 flex-none rounded-full bg-gray-100" />
                    <h3 class="flex-auto truncate text-sm font-semibold text-gray-900">
                        {{ item.user.name }}
                    </h3>
                    <time :datetime="item.dateTime" class="flex-none text-xs text-gray-600">
                        {{ item.date }}
                    </time>
                </div>
                <p class="mt-3 truncate text-sm text-gray-600">
                    {{ item.action }}
                </p>
            </li>
        </ul>
    </aside>
</template>

<script>
    import { useGlobalStore } from '@consultantManagerStore/globalStore.js'

    export default {
        name: 'ActivityFeed',
        data() {
            return {
                dataLoaded: false,
                globalStore: undefined,
                isCollapsed: false,  // Estado para controlar la visibilidad
            }
        },
        async mounted() {
            try {
                // Asegurarse de que globalStore se haya cargado correctamente
                this.globalStore = await useGlobalStore();
                this.dataLoaded = true;
            } catch (error) {
                console.error('Error al cargar globalStore:', error);
                this.dataLoaded = true; // Aún puedes mostrar la interfaz si no se cargan los datos
            }
        },
        computed: {
            activityItems() {
                // Comprobar si globalStore y activityItems existen antes de intentar acceder a ellos
                return (this.globalStore && this.globalStore.activityItems) || [];
            },
            isMobile() {
                return window.innerWidth < 1024; // Considera dispositivos móviles si el ancho es menor a 1024px
            }
        },
        methods: {
            toggleCollapse() {
                this.isCollapsed = !this.isCollapsed;  // Cambia el estado de visibilidad
            }
        }
    }
</script>

<style scoped>
    /* Para hacer la transición de la barra lateral más suave */
    aside {
        transition: width 0.3s ease;
    }
</style>
