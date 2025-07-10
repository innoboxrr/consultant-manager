import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultee-record-item',
		name: "AdminConsulteeRecordItems",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsulteeRecordItems',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsulteeRecordItem",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsulteeRecordItems',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsulteeRecordItem",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsulteeRecordItems',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsulteeRecordItem",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsulteeRecordItems',
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