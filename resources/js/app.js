import $ from '../../node_modules/jquery/dist/jquery.min';
require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.$ = $;

Alpine.start();
