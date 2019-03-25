$(function() {
    /**
     * Change content locale when user change tab in back end forms
     *
     * @param  {string} locale
     * @return {void}
     */
    function setContentLocale(locale) {
        axios.get('/admin/_locale/' + locale).catch(function() {
            alertify.error('Content locale couldn’t be set to ' + locale);
        });
    }

    $('.btn-lang-js').on('click', function(e) {
        var locale = $(this).data('locale'),
            label = $(this).text();
        $(this)
            .addClass('active')
            .siblings()
            .removeClass('active');
        if (locale == 'all') {
            $('.form-group-translation').show();
        } else {
            $('.form-group-translation')
                .hide()
                .has('[data-language="' + locale + '"]')
                .show();
        }
        $('#active-locale').text(label);
        setContentLocale(locale);
        e.preventDefault();
    });

    $('.btn-lang-js.active').trigger('click');
});
