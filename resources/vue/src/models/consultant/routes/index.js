import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultant',
		name: "AdminConsultants",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'Consultants',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultant",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear Consultants',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultant",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver Consultants',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultant",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar Consultants',
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