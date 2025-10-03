import { startStimulusApp } from '@symfony/stimulus-bridge';
import ChartController from '@symfony/ux-chartjs';
import './styles/admin.scss';

// Démarrage de Stimulus
export const app = startStimulusApp();

// enregistrement explicite du contrôleur Chart.js
app.register('symfony--ux-chartjs--chart', ChartController);

// registre des autres controllers via lazy loader
const context = require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.[jt]sx?$/
);
app.loadControllers(context);
