$(function() {
    function containsFiles(event) {
        if (event.dataTransfer.types) {
            for (var i = 0; i < event.dataTransfer.types.length; i++) {
                if (event.dataTransfer.types[i] == 'Files') {
                    return true;
                }
            }
        }
        return false;
    }
    $('#filepicker').on('dragenter', '.wrapper', function(event) {
        if ($('.filepicker-modal-open').length > 0) {
            if (containsFiles(event.originalEvent)) {
                $('#dropzone').addClass('fullscreen');
            }
        }
    });
    $('body').on('dragenter', function(event) {
        if ($('.filepicker-modal-open').length == 0) {
            if (containsFiles(event.originalEvent)) {
                $('#dropzone').addClass('fullscreen');
            }
        }
    });
    $('#dropzone').on('drop dragleave', function(event) {
        $('#dropzone').removeClass('fullscreen');
    });
});
