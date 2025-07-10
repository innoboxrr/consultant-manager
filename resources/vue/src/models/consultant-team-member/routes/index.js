import * as middleware from '@router/middleware'

export default [
	{
		path: 'consultant-team-member',
		name: "AdminConsultantTeamMembers",
		component: () => import ("./../views/AdminView.vue"),
		meta: {
			title: 'ConsultantTeamMembers',
			middleware: [
				middleware.auth
			]
		},
		children: [
			{
				path: 'create',
				name: "AdminCreateConsultantTeamMember",
				component: () => import ("./../views/CreateView.vue"),
				meta: {
					title: 'Crear ConsultantTeamMembers',
					middleware: [
						middleware.auth
					]
				}
			},
			{
				path: ':id',
				name: "AdminShowConsultantTeamMember",
				component: () => import ("./../views/ShowView.vue"),
				meta: {
					title: 'Ver ConsultantTeamMembers',
					middleware: [
						middleware.auth
					]
				},
				children: [
					{
						path: 'edit',
						name: "AdminEditConsultantTeamMember",
						component: () => import ("./../views/EditView.vue"),
						meta: {
							title: 'Editar ConsultantTeamMembers',
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