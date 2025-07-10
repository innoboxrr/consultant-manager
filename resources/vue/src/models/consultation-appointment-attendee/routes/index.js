import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-appointment-attendee',
		name: "AdminConsultationAppointmentAttendees",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationAppointmentAttendees',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationAppointmentAttendee",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationAppointmentAttendees',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationAppointmentAttendee",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationAppointmentAttendees',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationAppointmentAttendee",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationAppointmentAttendees',
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