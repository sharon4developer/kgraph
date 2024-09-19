function showMessage(type,message){
    switch(type){
        case 'success':alertify.success(message);break;
        case 'info':alertify.message(message);break;
        case 'warning':alertify.warning(message);break;
        case 'danger':alertify.error(message);break;
        case 'primary':alertify.primary(message);break;
        case 'secondary':alertify.secondary(message);break;
    }
}

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});

var BASE_URL=$('#base-route').val();
var ADMIN_BASE_URL=$('#route-for-user').val();
