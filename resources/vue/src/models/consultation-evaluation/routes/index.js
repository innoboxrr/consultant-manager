import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultation-evaluation',
		name: "AdminConsultationEvaluations",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultationEvaluations',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultationEvaluation",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultationEvaluations',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultationEvaluation",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultationEvaluations',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultationEvaluation",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultationEvaluations',
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