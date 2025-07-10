import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-chat-message',
		name: "AdminConsultationChatMessages",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationChatMessages',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationChatMessage",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationChatMessages',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationChatMessage",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationChatMessages',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationChatMessage",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationChatMessages',
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