$(function() {
    function updatepreferences(key, value) {
        var data = {};
        data[key] = value;
        axios.post('/api/users/current/updatepreferences', data).catch(function() {
            alertify.error('User preference couldn’t be set.');
        });
    }

    $('.panel-collapse').on('hide.bs.collapse', function() {
        updatepreferences('menus_' + $(this).attr('id') + '_collapsed', 'true');
    });
    $('.panel-collapse').on('show.bs.collapse', function() {
        updatepreferences('menus_' + $(this).attr('id') + '_collapsed', '');
    });
});
