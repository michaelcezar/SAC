jQuery(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});

function showMessage(title,message,type){
	var icon = '';
	switch(type) {
	    case 'success':
	        icon = 'fas fa-check';
        break;
        case 'danger':
        	icon = 'fas fa-exclamation-triangle';
        break;
        case 'warning':
        	icon = 'fas fa-exclamation-circle';
        break;
        case 'info':
        	icon = 'fas fa-info-circle';
        break;
        default:
        	console.log('Message type not found.');
        	return false;
    }
    $.notify(
        {
        	icon: icon,
            title  : '<strong>'+title+'</strong><br/>',
            message: message 
        },
        {
            type: type, /*success - info - warning - danger*/
            offset: 20,
			spacing: 10,
            delay: 5000,
            timer: 1000,
            z_index: 99999,
            placement: {
                from : "top",
                align: "right"
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        }
    );
}