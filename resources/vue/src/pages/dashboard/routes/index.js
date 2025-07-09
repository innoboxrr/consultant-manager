export default [
	{
		path: 'dashboard',
		name: "ConsultantManagerDashboard",
		component: () => import("./../layout/DashboardLayout.vue"),
		redirect: { name: "ConsultantManagerDashboardHome" },
		meta: {
			title: "Consultant Manager Dashboard",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerDashboardHome",
				component: () => import("./../views/HomeView.vue"),
			},
		]
	}
];