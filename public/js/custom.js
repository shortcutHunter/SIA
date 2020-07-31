$( document ).ready(function() {

    //Dropzone
    Dropzone.options.frmFileUpload = {
        paramName: "file",
        maxFilesize: 2
    };
    
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
            notify_error('Mohon pilih data yang ingin dihapus');
            return;
        }else{
            var form = generateForm(ids);
            $('body').append(form);
            $('#custom_form').submit();
        }
    });

    $('[export_file]').on('click', function(){
        var ids = [];
        var export_type = $(this).attr('export_file');
        $('.table_check').each(function(){
            if(this.checked){
                ids.push(this.value);
            }
        });
        if(ids.length == 0){
            notify_error('Mohon pilih data yang ingin export');
            return;
        }else{
            var form = generateForm(ids, '/master/export/file');
            $('body').append(form);
            $('#custom_form').append('<input type="hidden" name="file_type" value="'+export_type+'">');
            $('#custom_form').submit();
            $('#custom_form').remove();
        }
    });

    $('.btn-import-table').on('click', function(){
        var file_html = `
            <form action="/master/import/file" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                <div class="dz-message">
                    <div class="drag-icon-cph">
                        <i class="material-icons">touch_app</i>
                    </div>
                    <h3>Click untuk upload file.</h3>
                    <em>(Mohon untuk upload file excel saja)</em>
                </div>
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
        `;
        swal({
            title: '',
            text: file_html,
            html: true,
            showCancelButton: true,
            showConfirmButton: false,
            animation: "slide-from-top",
        });
        var token_string = $('[name=token]').val();
        var table = $('[name=table]').val();
        var myDropzone = new Dropzone("form.dropzone");
        myDropzone.on('sending', function(file, xhr, formData){
            formData.append('_token', token_string);
            formData.append('table', table);
        });
        myDropzone.on("success", function(file) {
            myDropzone.removeFile(file);
            swal.close();
            notify_error('Import successfully', 'bg-green');
            setTimeout(() => {
                window.location = getCurrentURL();
            }, 3000);
        });
        myDropzone.on('error', function(file, response) {
            myDropzone.removeFile(file);
            swal.close();
            notify_error(response.message);
        });
    });

});


function notify_error(text, colorName="bg-red"){
    var from = 'bottom';
    var align = 'right';
    var enter = 'animated fadeInDown';
    var exit = 'animated fadeOutUp';
    showNotification(colorName, text, from, align, enter, exit);
}

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

function generateForm(ids, url="/admin/master/delete") {
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