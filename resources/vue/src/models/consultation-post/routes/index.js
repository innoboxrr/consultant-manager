import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-post',
		name: "AdminConsultationPosts",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationPosts',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationPost",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationPosts',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationPost",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationPosts',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationPost",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationPosts',
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