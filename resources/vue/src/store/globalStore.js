import { defineStore } from 'pinia'
import { __cm } from './../utils/translate.js'
import { 
    HomeIcon,
    CubeIcon,
    MegaphoneIcon,
    BriefcaseIcon,
    UserGroupIcon,
    ShareIcon,
    BuildingStorefrontIcon,
    DocumentTextIcon,
    UsersIcon,
} from '@heroicons/vue/24/outline'

export const useGlobalStore = defineStore('consultant-manager-global', {
    state: () => ({
        sidebarOpen: false,
        navigation: [
            { name: __cm('Dashboard'), route: { name: 'ConsultantManagerDashboard' }, icon: HomeIcon, current: true },
        ],
        modelsNav: [
            /*
            {
                id: 1,
                name: __cm('Programs'),
                description: __cm('View and manage your affiliate programs'),
                icon: 'fa-solid fa-cubes',
                status: 'active',
                route: { name: 'AdminAffiliatePrograms' },
                current: false,
            },
            */
        ],
        activityItems: [
            /*
            {
                user: {
                    name: 'Michael Foster',
                    imageUrl: 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                },
                action: 'Renovó el dominio example.com',
                date: 'Hace 1h',
                dateTime: '2023-01-23T11:00',
            },
            */
        ],
    }),
    actions: {
        setCurrentRoute(routeName) {
            this.navigation.forEach(item => {
                item.current = item.route.name === routeName;
            });
            this.modelsNav.forEach(item => {
                item.current = item.route.name === routeName;
            });
        },
    },
})
