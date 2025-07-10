import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-appointment',
		name: "AdminConsultationAppointments",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationAppointments',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationAppointment",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationAppointments',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationAppointment",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationAppointments',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationAppointment",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationAppointments',
							middleware: [
								middleware.auth
							]
						}
					},
				]
			},
		]
	},
]