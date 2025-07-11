<template>
    <nav v-if="dataLoaded" class="flex flex-1 flex-col mb-12">
        <div class="text-xs font-semibold text-gray-400 mb-2">
            {{ __cm('Services') }}
        </div>
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li class="list-items">
                <ul role="list" class="-mx-2 space-y-1">
                    <li 
                        v-for="item in servicesNav" 
                        :key="item.name">
                        <router-link 
                            :to="item.route"
                            @click="setCurrent(item.route.name)"
                            :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold']">
                            <component :is="item.icon" class="h-6 w-6 flex-shrink-0" aria-hidden="true" />
                            {{ __cm(item.name) }}
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="list-items">
                <div class="text-xs font-semibold text-gray-400">
                    {{ __cm('Consultant') }}
                </div>
                <ul role="list" class="-mx-2 mt-2 space-y-1">
                    <li 
                        v-for="item in consultantNav" 
                        :key="item.name">
                        <router-link 
                            :to="item.route"
                            @click="setCurrent(item.route.name)"
                            :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold']">
                            <i :class="item.icon" class="pt-1 text-gray-500" aria-hidden="true"></i>
                            <span class="truncate">{{ __cm(item.name) }}</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="list-items">
                <div class="text-xs font-semibold text-gray-400">
                    {{ __cm('Consultee') }}
                </div>
                <ul role="list" class="-mx-2 mt-2 space-y-1">
                    <li 
                        v-for="item in consulteeNav" 
                        :key="item.name">
                        <router-link 
                            :to="item.route"
                            @click="setCurrent(item.route.name)"
                            :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold']">
                            <i :class="item.icon" class="pt-1 text-gray-500" aria-hidden="true"></i>
                            <span class="truncate">{{ __cm(item.name) }}</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li v-if="false" class="-mx-6 mt-auto author-list-items">
                <router-link to="/perfil" class="flex items-center gap-x-4 px-6 py-3 text-sm font-semibold text-gray-900 hover:bg-gray-50">
                    <img class="h-8 w-8 rounded-full bg-gray-100"
                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="" />
                    <span class="sr-only">Tu perfil</span>
                    <span aria-hidden="true">Tom Cook</span>
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
import { useGlobalStore } from '@consultantManagerStore/globalStore.js'
export default {
    name: 'SidebarMenu',
    data() {
        return {
            dataLoaded: false,
            globalStore: useGlobalStore(),
        }
    },
    mounted() {
        this.dataLoaded = true;
    },
    computed: {
        consultantNav() {
            return this.globalStore.consultantNav || []
        },
        consulteeNav() {
            return this.globalStore.consulteeNav || []
        },
        servicesNav() {
            return this.globalStore.servicesNav || []
        },
    },
    methods: {
        setCurrent(routeName) {
            this.globalStore.setCurrentRoute(routeName)
        },
    },
}
</script>

<style scoped>

</style>