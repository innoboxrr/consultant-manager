export default [
	{
		path: 'consultee/profile',
		name: "ConsultantManagerConsulteeProfile",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerConsulteeProfileHome" },
		meta: {
			title: "Consultant Manager Consultee Profile",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerConsulteeProfileHome",
				component: () => import("../views/HomeView.vue"),
			},
		]
	}
];