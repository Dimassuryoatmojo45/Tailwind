import './bootstrap';

import Alpine from 'alpinejs';
import chart01 from './js/components/charts/chart-01.js';

document.addEventListener('DOMContentLoaded', () => {
  chart01();
});

window.Alpine = Alpine;

Alpine.start();

