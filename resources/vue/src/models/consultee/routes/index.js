import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultee',
		name: "AdminConsultees",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'Consultees',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultee",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear Consultees',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultee",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver Consultees',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultee",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar Consultees',
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