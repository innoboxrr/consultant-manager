import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-service',
		name: "AdminConsultationServices",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationServices',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationService",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationServices',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationService",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationServices',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationService",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationServices',
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