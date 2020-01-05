/**
 * Allows you to add data-method="METHOD to links to automatically inject a form
 * with the method on click
 *
 * Example: <a href="{{route('customers.destroy', $customer->id)}}"
 * data-method="delete" name="delete_item">Delete</a>
 *
 * Injects a form with that's fired on click of the link with a DELETE request.
 * Good because you don't have to dirty your HTML with delete forms everywhere.
 */
function addDeleteForms() {
  $('[data-method]').append(function () {
    if (!$(this).find('form').length > 0) {
      return "\n<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" +
        "<input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
        "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
        '</form>\n';
    } else { return '' }
  })
    .attr('href', 'javascript:;')
    .attr('style', 'cursor:pointer;')
    .attr('onclick', '$(this).find("form").submit();');
}

function addMultipleDeleteForms() {
  $('[data-delete]').append(function () {
    if (!$(this).find('form').length > 0) {
      return "\n<form action='" + $(this).attr('href') + "' method='POST' name='delete_multiple_item' style='display:none'>\n" +
        "<input type='hidden' name='_method' value='" + $(this).attr('data-delete') + "'>\n" +
        "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
        "<input type='hidden' name='ids' id='bulk_delete_input' value=''>\n" +
        '</form>\n';
    } else { return '' }
  })
    .attr('href', 'javascript:;')
    .attr('style', 'cursor:pointer;')
    .attr('onclick', '$(this).find("form").submit();');
}

/**
 * Place any jQuery/helper plugins in here.
 */
$(function () {
  /**
   * Add the data-method="delete" forms to all delete links
   */
  addDeleteForms();

  /**
   * Add the data-delete="all" forms to all delete links
   */
  addMultipleDeleteForms();

  /**
   * Disable all submit buttons once clicked
   */
  $('form').submit(function () {
    $(this).find('input[type="submit"]').attr('disabled', true);
    $(this).find('button[type="submit"]').attr('disabled', true);
    return true;
  });

  const $body = $('body');

  /**
   * Generic confirm form delete using Sweet Alert
   */
  $body.on('submit', 'form[name=delete_item]', function (e) {
    e.preventDefault();

    const form = this;
    const link = $('a[data-method="delete"]');
    const cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : 'Cancel';
    const confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : 'Yes, delete';
    const title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : 'Are you sure you want to delete this item?';

    Swal.fire({
      title: title,
      showCancelButton: true,
      confirmButtonText: confirm,
      cancelButtonText: cancel,
      type: 'warning'
    }).then((result) => {
      result.value && form.submit();
    });
  }).on('click', 'a[name=confirm_item]', function (e) {
    /**
     * Generic 'are you sure' confirm box
     */
    e.preventDefault();

    const link = $(this);
    const title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : 'Are you sure you want to do this?';
    const cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : 'Cancel';
    const confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : 'Continue';

    Swal.fire({
      title: title,
      showCancelButton: true,
      confirmButtonText: confirm,
      cancelButtonText: cancel,
      type: 'info'
    }).then((result) => {
      result.value && window.location.assign(link.attr('href'));
    });
  });

  $body.on('submit', 'form[name=delete_multiple_item]', function (e) {
    e.preventDefault();

    const form = this;
    const link = $('a[data-delete="all"]');
    const cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : 'Cancel';
    const confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : 'Yes, delete';
    const title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : 'Are you sure you want to delete this item?';

    Swal.fire({
      title: title,
      showCancelButton: true,
      confirmButtonText: confirm,
      cancelButtonText: cancel,
      type: 'warning'
    }).then((result) => {
      result.value && form.submit();
    });
  }).on('click', 'a[name=confirm_item]', function (e) {
    /**
     * Generic 'are you sure' confirm box
     */
    e.preventDefault();

    const link = $(this);
    const title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : 'Are you sure you want to do this?';
    const cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : 'Cancel';
    const confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : 'Continue';

    Swal.fire({
      title: title,
      showCancelButton: true,
      confirmButtonText: confirm,
      cancelButtonText: cancel,
      type: 'info'
    }).then((result) => {
      result.value && window.location.assign(link.attr('href'));
    });
  });

  $('[data-toggle="tooltip"]').tooltip();
});
