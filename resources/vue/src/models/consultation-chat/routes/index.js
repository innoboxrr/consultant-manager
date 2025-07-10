import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-chat',
		name: "AdminConsultationChats",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationChats',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationChat",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationChats',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationChat",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationChats',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationChat",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationChats',
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