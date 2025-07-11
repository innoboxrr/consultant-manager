export default [
	{
		path: 'consultant/services',
		name: "ConsultantManagerConsultantServices",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerConsultantServicesHome" },
		meta: {
			title: "Consultant Manager Consultant Services",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerConsultantServicesHome",
				component: () => import("./../views/HomeView.vue"),
			},
		]
	}
];