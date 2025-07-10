import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultee-record',
		name: "AdminConsulteeRecords",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsulteeRecords',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsulteeRecord",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsulteeRecords',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsulteeRecord",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsulteeRecords',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsulteeRecord",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsulteeRecords',
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