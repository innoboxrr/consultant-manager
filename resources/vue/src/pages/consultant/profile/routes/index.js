export default [
	{
		path: 'consultant/profile',
		name: "ConsultantManagerConsultantProfile",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerConsultantProfileHome" },
		meta: {
			title: "Consultant Manager Profile",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerConsultantProfileHome",
				component: () => import("../views/HomeView.vue"),
			},
		]
	}
];