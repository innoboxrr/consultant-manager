import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-price',
		name: "AdminConsultationPrices",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationPrices',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationPrice",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationPrices',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationPrice",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationPrices',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationPrice",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationPrices',
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