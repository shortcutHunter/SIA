$( document ).ready(function() {
    
    $('#checkall').on('change', function(){
        if(this.checked){
            $('.table_check').prop('checked', true);
        }else{
            $('.table_check').prop('checked', false);
        }
    });

    $('.view-info').on('click', function(){
        var row_id = $(this).attr('row_id');
        var current_url = getCurrentURL();
        window.location = current_url + "/" + row_id;
    });

    $('.btn-delete-table').on('click', function(){
        var ids = [];
        $('.table_check').each(function(){
            if(this.checked){
                ids.push(this.value);
            }
        });
        if(ids.length == 0){
            var colorName = 'bg-red';
            var text = 'Mohon pilih data yang ingin dihapus';
            var from = 'bottom';
            var align = 'right';
            var enter = 'animated fadeInDown';
            var exit = 'animated fadeOutUp';
            showNotification(colorName, text, from, align, enter, exit);
            return;
        }else{
            var form = generateForm(ids);
            $('body').append(form);
            $('#custom_form').submit();
        }
    });

});


function getCurrentURL(){
    var current = window.location.pathname;
    var splited = current.split("/");
    if(splited[splited.length-1] == ''){
        splited.pop();
        return splited.join('/');
    }else{
        return splited.join('/');
    }
}

function generateForm(ids) {
    var url = "/admin/master/delete";
    var token_string = $('[name=token]').val();
    var table = $('[name=table]').val();
    var form = '<form action="' + url + '" method="POST" style="display:none;" id="custom_form">';
    form += '<input type="hidden" name="_token" value="' + token_string + '">';
    form += '<input type="hidden" name="table" value="' + table + '">';
    form += '<input type="hidden" name="url" value="' + getCurrentURL() + '">';
    $.each(ids, function(key, value){
        form += '<input type="hidden" name="record_id_' + key + '" value="' + value + '">';
    });
    form += "</form>";
    
    return form;
}