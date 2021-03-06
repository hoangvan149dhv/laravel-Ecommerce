window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    window.Ziggy = require('./libraries/ziggy').Ziggy;
    window.route = require('ziggy-js');
    require('../js/theme/chart')
    require('../js/theme/custom')
    require('../js/theme/map')
    require('../js/theme/sleek')
    require('jquery.easing');
    require('jquery-slimscroll');
    require('datatables.net-bs4');
    require('datatables.net-responsive-bs4');
    require('bootstrap');
    require('owl.carousel');
    require('owl.carousel/dist/owl.carousel');
    require('slick-carousel/slick/slick.min')
    window.queryString = require('querystring');
    window.Swal = require('sweetalert2');
    window.toastr = require('toastr/toastr');
    require('bootstrap-datepicker/dist/js/bootstrap-datepicker');
    require('select2');
    window.Dropzone = require('dropzone/dist/dropzone').default;
    window.tinymce = require('tinymce/tinymce');
    window.AutoNumeric = require('autonumeric');
} catch (e) {
    // eslint-disable-next-line no-console
    console.error(e);
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
