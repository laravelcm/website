$(document).ready(function() {
    $('#address').blur(function() {
        var address = $('#address').val();
        if (address !== '') {
            getLonLatFromAddress(address);
        } else {
            $('#latitude').attr('value', '');
            $('#longitude').attr('value', '');
        }
    });
    function getLonLatFromAddress(address) {
        var url = 'https://nominatim.openstreetmap.org/?format=json&addressdetails=1&q=' + address + '&limit=1';
        $.get(url, function(data) {
            if (data.length > 0) {
                var info = data[0];
                $('#latitude').attr('value', info.lat);
                $('#longitude').attr('value', info.lon);
            }
        });
    }
});
