import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultant-record-template',
		name: "AdminConsultantRecordTemplates",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultantRecordTemplates',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultantRecordTemplate",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultantRecordTemplates',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultantRecordTemplate",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultantRecordTemplates',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultantRecordTemplate",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultantRecordTemplates',
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