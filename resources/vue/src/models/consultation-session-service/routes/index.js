import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-session-service',
		name: "AdminConsultationSessionServices",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationSessionServices',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationSessionService",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationSessionServices',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationSessionService",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationSessionServices',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationSessionService",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationSessionServices',
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