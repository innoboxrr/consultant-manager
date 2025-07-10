import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultee-record-response',
		name: "AdminConsulteeRecordResponses",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsulteeRecordResponses',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsulteeRecordResponse",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsulteeRecordResponses',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsulteeRecordResponse",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsulteeRecordResponses',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsulteeRecordResponse",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsulteeRecordResponses',
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