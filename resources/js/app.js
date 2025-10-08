import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';


toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 4000,
};

window.toastr = toastr;
