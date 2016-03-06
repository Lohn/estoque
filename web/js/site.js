$(document).on('click', '.delete', function(e){
    e.preventDefault();
    var url = $(this).attr('href');
    bootbox.confirm({
        message: $(this).data('message'),    
        buttons: {
            confirm: {
                label: 'Confirmar'
            },
            cancel: {
                label: 'Cancelar'
            }
        },     
        callback: function (result) {
            if (result) {
                $.post(url,
                    function(data, status){
                        window.location.reload(true); 
                    }
                );
            }
        }
    });
    return false;
})

$(document).on('keydown', '.search-input', function(e){
    var key = e.keyCode || e.charCode;
    if( key == 8 || key == 46 ) {
        if ($(this).val() === '') {
            var url = $(this).data('url');
            window.location.replace(url);    
        } 
    }   
    
})