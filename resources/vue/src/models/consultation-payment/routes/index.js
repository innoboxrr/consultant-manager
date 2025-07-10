import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-payment',
		name: "AdminConsultationPayments",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationPayments',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationPayment",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationPayments',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationPayment",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationPayments',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationPayment",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationPayments',
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