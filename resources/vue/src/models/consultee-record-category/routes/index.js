import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultee-record-category',
		name: "AdminConsulteeRecordCategories",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsulteeRecordCategories',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsulteeRecordCategory",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsulteeRecordCategories',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsulteeRecordCategory",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsulteeRecordCategories',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsulteeRecordCategory",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsulteeRecordCategories',
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