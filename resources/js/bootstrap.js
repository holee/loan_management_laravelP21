import axios from 'axios';
import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.js';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
