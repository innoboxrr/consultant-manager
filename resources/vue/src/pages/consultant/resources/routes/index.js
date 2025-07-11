export default [
	{
		path: 'consultant/resources',
		name: "ConsultantManagerConsultantResources",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerConsultantResourcesHome" },
		meta: {
			title: "Consultant Manager Resources",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerConsultantResourcesHome",
				component: () => import("../views/HomeView.vue"),
			},
		]
	}
];