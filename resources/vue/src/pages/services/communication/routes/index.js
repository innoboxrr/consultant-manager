export default [
	{
		path: 'communication',
		name: "ConsultantManagerServicesCommunication",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerServicesCommunicationHome" },
		meta: {
			title: "Consultant Manager Services Communication",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerServicesCommunicationHome",
				component: () => import("../views/HomeView.vue"),
			},
		]
	}
];