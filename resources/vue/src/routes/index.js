const modules = import.meta.glob('../**/routes/index.js', { eager: true });
const appRoutes = Object.values(modules).flatMap(m => m.default || []);

if (!Array.isArray(appRoutes)) {
    console.error('[ConsultantManagerApp] appRoutes is not an array.');
}

export default [{
	path: 'app',
	name: 'ConsultantManagerApp',
	redirect: { name: 'ConsultantManagerDashboard' },
	meta: {
		title: 'Consultant Manager App',
	},
	children: [
		...appRoutes,
	],
}];