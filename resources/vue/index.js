import ConsultantManagerApp from './src/ConsultantManagerApp.vue';
import ConsultantManagerRoutes from './src/routes';
import { TranslatePlugin, TitlePlugin } from './src/plugins';

export const routes = ConsultantManagerRoutes;

export default {
    install(app, options = {}) {
        app.use(TranslatePlugin, options.translateOptions || {});
        app.use(TitlePlugin);
        app.component('ConsultantManagerApp', ConsultantManagerApp);
    }
};
