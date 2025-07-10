import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-post-attachment',
		name: "AdminConsultationPostAttachments",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationPostAttachments',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationPostAttachment",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationPostAttachments',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationPostAttachment",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationPostAttachments',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationPostAttachment",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationPostAttachments',
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