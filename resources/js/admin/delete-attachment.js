$(function() {
    /**
     * Delete attachment
     */
    $('.delete-attachment').click(function() {
        var field = $(this).data('field'),
            id = $(this).data('id'),
            table = $(this).data('table'),
            data = {},
            $this = $(this),
            url = '/admin/' + table + '/' + id;

        if (!confirm('Delete ' + field + '?')) {
            return false;
        }

        data['id'] = id;
        data[field] = 'delete';

        axios
            .patch(url, data)
            .then(() => {
                $this.parent().remove();
            })
            .catch(() => {
                alertify.error('An error occurred while deleting attachment.');
            });

        return false;
    });
});
