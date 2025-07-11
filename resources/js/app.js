import './bootstrap';

import Alpine from 'alpinejs';
import chart01 from './js/components/charts/chart-01.js';
import chart02 from './js/components/charts/chart-02.js';

document.addEventListener('DOMContentLoaded', () => {
  chart01();
  chart02();
});

window.Alpine = Alpine;

Alpine.start();

