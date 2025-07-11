export default [
	{
		path: 'consultant/dashboard',
		name: "ConsultantManagerConsultantDashboard",
		component: () => import("./../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerConsultantDashboardHome" },
		meta: {
			title: "Consultant Manager Consultant Dashboard",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerConsultantDashboardHome",
				component: () => import("./../views/HomeView.vue"),
			},
		]
	}
];