<template>
    <div>
        <TransitionRoot 
            as="template" 
            :show="sidebarOpen">
            <Dialog 
                class="relative z-50 lg:hidden" 
                @close="sidebarOpen = false">
                <TransitionChild 
                    as="template" 
                    enter="transition-opacity ease-linear duration-300" 
                    enter-from="opacity-0" 
                    enter-to="opacity-100" 
                    leave="transition-opacity ease-linear duration-300" 
                    leave-from="opacity-100" 
                    leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-900/80"></div>
                </TransitionChild>

                <div class="fixed inset-0 flex">
                    <TransitionChild 
                        as="template" 
                        enter="transition ease-in-out duration-300 transform" 
                        enter-from="-translate-x-full" 
                        enter-to="translate-x-0" 
                        leave="transition ease-in-out duration-300 transform" 
                        leave-from="translate-x-0" 
                        leave-to="-translate-x-full">
                        <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
                            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                                    <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                                        <span class="sr-only">Close sidebar</span>
                                        <XMarkIcon class="size-6 text-white" aria-hidden="true" />
                                    </button>
                                </div>
                            </TransitionChild>

                            <!-- Sidebar component, swap this element with another sidebar if you like -->
                            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-2">
                                <div class="flex h-16 shrink-0 items-center">
                                    <img 
                                        class="h-8 w-auto" 
                                        src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" 
                                        alt="Your Company" />
                                </div>
                                <nav class="flex flex-1 flex-col">
                                    <consultation-advice-list :items="items" />
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-30 lg:flex lg:w-72 lg:flex-col ">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6">
                <div class="flex h-16 shrink-0 items-center">
                    <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
                </div>
                <nav class="flex flex-1 flex-col mt-8">
                    <consultation-advice-list :items="items" />
                </nav>
            </div>
        </div>

        <!-- Esto es para mostrar el toggle en versión móvil -->
        <div class="sticky top-0 z-30 flex items-center gap-x-6 bg-white px-4 py-4 shadow-sm sm:px-6 lg:hidden">
            <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
                <span class="sr-only">Open sidebar</span>
                <Bars3Icon class="size-6" aria-hidden="true" />
            </button>
            <div class="flex-1 text-sm/6 font-semibold text-gray-900">
                {{ __cm('Consultancy Service') }}
            </div>
        </div>

        <main class="py-10 lg:pl-72">
            <div>
                <router-view></router-view>
            </div>
        </main>

    </div>
</template>

<script>
    import { 
        Dialog, 
        DialogPanel, 
        TransitionChild, 
        TransitionRoot,
    } from '@headlessui/vue'
    import {
        Bars3Icon,
        XMarkIcon,
    } from '@heroicons/vue/24/outline'
    import ConsultationAdviceList from './ConsultationAdviceList.vue'
    export default {
        name: "HomeView",
        components: {
            Dialog,
            DialogPanel,
            TransitionChild,
            TransitionRoot,
            Bars3Icon,
            XMarkIcon,
            ConsultationAdviceList,
        },
        data() {
            return {
                sidebarOpen: false,
            };
        },
    };
</script>

<style>
    html {
        overflow: hidden;
    }
</style>