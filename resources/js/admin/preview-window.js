$(function() {
    /**
     * Build modal window
     */
    $('<div>', {
        id: 'preview-window',
        class: 'typicms-modal',
    }).appendTo('body');

    $('<div>', {
        id: 'preview-window-wrapper',
        class: 'typicms-modal-wrapper',
    }).appendTo('#preview-window');

    $('<iframe>', {
        src: this.href,
        id: 'preview-content',
        class: 'typicms-modal-content',
        frameborder: 0,
    }).prependTo('#preview-window-wrapper');

    $('<button>', {
        id: 'close-preview',
        class: 'typicms-modal-btn-close',
    }).appendTo('#preview-window');

    $('<span>', {
        class: 'fa fa-close',
    }).appendTo('#close-preview');

    /**
     * Open preview window
     */
    $('.btn-preview').on('click', function(event) {
        event.preventDefault();
        $('#preview-content').attr({ src: this.href });
        $('html, body').addClass('noscroll');
        $('#preview-window').addClass('typicms-modal-open');
    });

    /**
     * Close preview window
     */
    $('body').on('click', '#close-preview', function(event) {
        event.preventDefault();
        $('#preview-content').attr({ src: '' });
        $('html, body').removeClass('noscroll');
        $('#preview-window').removeClass('typicms-modal-open');
    });
});
