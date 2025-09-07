import ConsultantManagerRoutes from './routes';
import { TranslatePlugin, TitlePlugin } from './plugins';

export const routes = ConsultantManagerRoutes;

export default {
    install(app, options = {}) {
        app.use(TranslatePlugin, options.translateOptions || {});
        app.use(TitlePlugin);
    }
};
