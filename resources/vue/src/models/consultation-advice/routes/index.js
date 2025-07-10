import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-advice',
		name: "AdminConsultationAdvices",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationAdvices',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationAdvice",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationAdvices',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationAdvice",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationAdvices',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationAdvice",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationAdvices',
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