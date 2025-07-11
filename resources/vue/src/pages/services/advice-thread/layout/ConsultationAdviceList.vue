<template>
    <div class="space-y-3 max-w-md w-full mx-auto">
        <a
            href="#"
            class="inline-flex items-center justify-center gap-2 rounded-md bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium px-4 py-2 transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 w-full hover:text-white"
        >
            <i class="fas fa-plus text-xs"></i>
            {{ __cm('Create new thread') }}
        </a>

        <div
            v-for="item in items"
            :key="item.id"
            class="flex items-start gap-3 p-3 rounded-md bg-white dark:bg-gray-900 hover:shadow transition border border-gray-200 dark:border-gray-800 cursor-pointer"
        >
            <img
                :src="item.avatar"
                alt="avatar"
                class="w-10 h-10 rounded-full object-cover flex-shrink-0"
            />

            <div class="flex-1 min-w-0">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-800 dark:text-white">
                            {{ item.author }}
                        </span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            {{ item.date }}
                        </span>
                    </div>
                    <div class="mt-1 flex items-center gap-x-1.5">
                        <div 
                            class="flex-none rounded-full p-1"
                            :class="{
                                'bg-emerald-500/20': item.status === 'active',
                                'bg-red-500/20': item.status === 'inactive'
                            }">
                            <div
                                class="size-1.5 rounded-full"
                                :class="{
                                    'bg-emerald-500': item.status === 'active',
                                    'bg-red-500': item.status === 'inactive'
                                }"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100 line-clamp-1">
                        {{ item.title }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                        {{ item.summary }}
                    </p>
                </div>

                <div class="mt-2 flex gap-4 text-xs text-gray-500 dark:text-gray-400">
                    <span>{{ item.replies }} respuestas</span>
                    <span>{{ item.views }} vistas</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ConsultationAdviceList",
    data() {
        return {
            items: [
                {
                    id: 1,
                    title: "¿Cómo manejar clientes que cancelan a último momento?",
                    author: "Ana Gómez",
                    avatar: "https://i.pravatar.cc/40?img=1",
                    date: "Hace 2 horas",
                    summary: "Estoy buscando estrategias para manejar cancelaciones repentinas sin afectar mis ingresos ni mi agenda...",
                    status: "active",
                    replies: 5,
                    views: 120
                },
                {
                    id: 2,
                    title: "Plantillas de seguimiento por WhatsApp efectivas",
                    author: "Carlos Pérez",
                    avatar: "https://i.pravatar.cc/40?img=2",
                    date: "Ayer",
                    summary: "¿Alguien tiene ejemplos de mensajes que realmente funcionen para retomar leads fríos sin parecer insistente?",
                    status: "inactive",
                    replies: 8,
                    views: 210
                },
                {
                    id: 1,
                    title: "¿Cómo manejar clientes que cancelan a último momento?",
                    author: "Ana Gómez",
                    avatar: "https://i.pravatar.cc/40?img=1",
                    date: "Hace 2 horas",
                    summary: "Estoy buscando estrategias para manejar cancelaciones repentinas sin afectar mis ingresos ni mi agenda...",
                    status: "active",
                    replies: 5,
                    views: 120
                },
                {
                    id: 2,
                    title: "Plantillas de seguimiento por WhatsApp efectivas",
                    author: "Carlos Pérez",
                    avatar: "https://i.pravatar.cc/40?img=2",
                    date: "Ayer",
                    summary: "¿Alguien tiene ejemplos de mensajes que realmente funcionen para retomar leads fríos sin parecer insistente?",
                    status: "inactive",
                    replies: 8,
                    views: 210
                },
                {
                    id: 1,
                    title: "¿Cómo manejar clientes que cancelan a último momento?",
                    author: "Ana Gómez",
                    avatar: "https://i.pravatar.cc/40?img=1",
                    date: "Hace 2 horas",
                    summary: "Estoy buscando estrategias para manejar cancelaciones repentinas sin afectar mis ingresos ni mi agenda...",
                    status: "active",
                    replies: 5,
                    views: 120
                },
                {
                    id: 2,
                    title: "Plantillas de seguimiento por WhatsApp efectivas",
                    author: "Carlos Pérez",
                    avatar: "https://i.pravatar.cc/40?img=2",
                    date: "Ayer",
                    summary: "¿Alguien tiene ejemplos de mensajes que realmente funcionen para retomar leads fríos sin parecer insistente?",
                    status: "inactive",
                    replies: 8,
                    views: 210
                }
            ]
        };
    },  
}
</script>
