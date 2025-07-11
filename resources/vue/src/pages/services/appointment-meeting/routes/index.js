export default [
	{
		path: 'appointment-meeting',
		name: "ConsultantManagerServicesAppointmentMeeting",
		component: () => import("../layout/PageLayout.vue"),
		redirect: { name: "ConsultantManagerServicesAppointmentMeetingHome" },
		meta: {
			title: "Consultant Manager Services Appointment Meeting",
		},
		children: [
			{
				path: 'home',
				name: "ConsultantManagerServicesAppointmentMeetingHome",
				component: () => import("../views/HomeView.vue"),
			},
		]
	}
];