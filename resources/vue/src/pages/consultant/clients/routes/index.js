export default [
	{
		path: 'consultant/clients',
		name: "ConsultantManagerConsultantClients",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerConsultantClientsHome" },
		meta: {
			title: "Consultant Manager Consultant Clients",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerConsultantClientsHome",
				component: () => import("../views/HomeView.vue"),
			},
		]
	}
];