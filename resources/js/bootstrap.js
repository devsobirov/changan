import axios from 'axios';
window.axios = axios;

import './main.js';
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

