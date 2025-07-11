export default [
	{
		path: 'consultant/financials',
		name: "ConsultantManagerConsultantFinancials",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerConsultantFinancialsHome" },
		meta: {
			title: "Consultant Manager Consultant Financials",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerConsultantFinancialsHome",
				component: () => import("../views/HomeView.vue"),
			},
		]
	}
];