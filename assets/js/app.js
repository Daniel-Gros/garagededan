import { Filter } from './modules/Filter.js';
import { RangeSetup } from './modules/RangeSetup.js';



Filter();
RangeSetup();


// any CSS you import will output into a single css file (app.css in this case)
import '../styles/sass/app.sass';
import '../styles/assets/css/app.css';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});