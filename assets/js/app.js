import { Filter } from './modules/Filter.js';
import { RangeSetup } from './modules/RangeSetup.js';
import { ResetFilter} from './modules/ResetFilter.js';


Filter();
RangeSetup();
ResetFilter();

// any CSS you import will output into a single css file (app.css in this case)
import '../styles/sass/app.sass';
import '../styles/assets/css/app.css';
