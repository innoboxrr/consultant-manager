import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-intake-form',
		name: "AdminConsultationIntakeForms",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationIntakeForms',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationIntakeForm",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationIntakeForms',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationIntakeForm",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationIntakeForms',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationIntakeForm",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationIntakeForms',
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