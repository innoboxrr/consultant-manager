export default [
	{
		path: 'consultee/services',
		name: "ConsultantManagerConsulteeDashboard",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerConsulteeDashboardHome" },
		meta: {
			title: "Consultant Manager Consultee Dashboard",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerConsulteeDashboardHome",
				component: () => import("../views/HomeView.vue"),
			},
		]
	}
];