export default [
	{
		path: 'advice-thread',
		name: "ConsultantManagerServicesAdviceThread",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerServicesAdviceThreadHome" },
		meta: {
			title: "Consultant Manager Services Advice Thread",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerServicesAdviceThreadHome",
				component: () => import("../views/HomeView.vue"),
			},
			{
				path: 'create',
				name: "ConsultantManagerServicesAdviceThreadCreate",
				component: () => import("../views/CreateView.vue"),
			},
			{
				path: 'follow-up/:id',
				name: "ConsultantManagerServicesAdviceThreadFollowUp",
				component: () => import("../views/FollowUpView.vue"),
			},
		]
	}
];