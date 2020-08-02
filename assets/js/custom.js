$(document).ready(function () {
    initDatePicker();
    initValidateForm();
    initReaderImg();
});

// Inicia el caledario : bootstrap.
function initDatePicker() {    
    $('.date-picker').datetimepicker({
        language: 'es',
        weekStart: 0,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
}

function initValidateForm() {
    $("#form").submit(function () {
        return $(this).validate();
    });
}

function initReaderImg() {
    $('#inputFile').change(function (e) {
        var files = e.target.files;
        var file = files[0];

        if (!file.type.match(/image.*/i)) {
            alert('seleccione una imagen');
            return false;
        }

        var lector = new FileReader();
        lector.onload = function (e) {
            var src = e.target.result;
            $('#img').attr('src', src);
        };
        lector.readAsDataURL(file);
        return true;
    });
}