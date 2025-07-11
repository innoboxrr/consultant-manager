import { defineStore } from 'pinia'
import { __cm } from './../utils/translate.js'
import {
    ChatBubbleBottomCenterTextIcon,
    CalendarIcon,
    ClipboardDocumentListIcon,
} from '@heroicons/vue/24/outline'

export const useGlobalStore = defineStore('consultant-manager-global', {
    state: () => ({
        sidebarOpen: false,

        servicesNav: [
            {
                name: __cm('Consultancy'),
                description: __cm('Get professional advice on your case'),
                icon: ClipboardDocumentListIcon,
                route: { name: 'ConsultantManagerServicesAdviceThread' },
                current: false,
            },
            {
                name: __cm('Appointments'),
                description: __cm('Book and manage your appointments'),
                icon: CalendarIcon,
                route: { name: 'ConsultantManagerServicesAppointmentMeeting' },
                current: false,
            },
            {
                name: __cm('Communication'),
                description: __cm('Chat and communicate with your consultant'),
                icon: ChatBubbleBottomCenterTextIcon,
                route: { name: 'ConsultantManagerServicesCommunication' },
                current: false,
            },
        ],
        
        consultantNav: [
            {
                name: __cm('Dashboard'),
                route: { name: 'ConsultantManagerConsultantDashboard' },
                icon: 'fa-solid fa-house',
                current: false,
            },
            {
                name: __cm('Services'),
                route: { name: 'ConsultantManagerConsultantServices' },
                icon: 'fa-solid fa-cubes',
                current: false,
            },
            {
                name: __cm('Clients'),
                route: { name: 'ConsultantManagerConsultantClients' },
                icon: 'fa-solid fa-users',
                current: false,
            },
            {
                name: __cm('Financials'),
                route: { name: 'ConsultantManagerConsultantFinancials' },
                icon: 'fa-solid fa-briefcase',
                current: false,
            },
            {
                name: __cm('Profile'),
                route: { name: 'ConsultantManagerConsultantProfile' },
                icon: 'fa-solid fa-user',
                current: false,
            },
            {
                name: __cm('Resources'),
                route: { name: 'ConsultantManagerConsultantResources' },
                icon: 'fa-solid fa-table-cells-large',
                current: false,
            },
        ],

        consulteeNav: [
            {
                name: __cm('Home'),
                description: __cm('Your dashboard and next steps'),
                icon: 'fa-solid fa-house',
                route: { name: 'ConsultantManagerConsulteeDashboard' },
                current: false,
            },
            {
                name: __cm('Profile'),
                description: __cm('Manage your account details'),
                icon: 'fa-solid fa-user',
                route: { name: 'ConsultantManagerConsulteeProfile' },
                current: false,
            },
        ],
    }),

    actions: {
        setCurrentRoute(routeName) {
            const allNavs = [
                ...this.consultantNav,
                ...this.consulteeNav,
                ...this.servicesNav,
            ]

            allNavs.forEach(item => {
                item.current = item.route.name === routeName
            })
        },
    },
})
