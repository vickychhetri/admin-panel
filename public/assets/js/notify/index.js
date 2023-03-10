'use strict';
var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Loading</strong>', {
    type: 'theme',
    allow_dismiss: true,
    delay: 2000,
    showProgressbar: true,
    timer: 500,
    animate:{
        enter:'animated fadeInDown',
        exit:'animated fadeOutUp'
    }
});


