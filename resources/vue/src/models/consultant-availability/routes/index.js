import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultant-availability',
		name: "AdminConsultantAvailabilities",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultantAvailabilities',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultantAvailability",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultantAvailabilities',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultantAvailability",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultantAvailabilities',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultantAvailability",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultantAvailabilities',
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