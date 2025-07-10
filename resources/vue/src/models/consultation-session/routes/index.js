import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-session',
		name: "AdminConsultationSessions",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationSessions',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationSession",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationSessions',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationSession",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationSessions',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationSession",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationSessions',
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