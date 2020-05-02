"use strict";

const RolesList = () => {
  const roles = document.getElementById('roles');

  const options = {
    // datasource definition
    data: {
      type: 'remote',
      source: {
        read: {
          method: 'GET',
          url: route('api.roles.index').template,
          map: function(raw) {
            return typeof raw.data !== 'undefined' ? raw.data : raw;
          },
        }
      },
      pageSize: 10,
      serverPaging: true
    },

    // layout definition
    layout: {
      scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
      footer: false // display/hide footer
    },

    // column sorting
    sortable: true,

    pagination: true,

    search: {
      input: $('#generalSearch')
    },

    // columns definition
    columns: [
      {
        field: 'id',
        title: '#',
        sortable: false,
        width: 20,
        selector: {
          class: 'kt-checkbox--solid'
        },
        textAlign: 'center',
      },
      {
        field: 'display_name',
        title: 'Role',
        sortable: true
      },
      {
        field: 'description',
        title: 'Description',
        width: 450,
        sortable: true
      },
      {
        field: 'users_count',
        title: 'Users',
        width: 75,
        sortable: true,
        template: function (row) {
          return row.users_count;
        }
      },
      {
        field: 'Actions',
        title: 'Actions',
        sortable: false,
        width: 110,
        overflow: 'visible',
        autoHide: false,
        template: function(row) {
          return `
            <div class="d-flex">
              <a href="${route('admin.auth.role.edit', { id: row.id })}" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">
                 <i class="flaticon2-edit"></i>
              </a>
              <form action='${route('admin.auth.role.destroy', { id: row.id })}' method='POST' id="delete_item_${row.id}" name='delete_item'>
                <input type='hidden' name='_method' value='delete'>
                <input type='hidden' name='_token' value='${$('meta[name="csrf-token"]').attr('content')}'>
                <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Delete">
                  <i class="flaticon-delete"></i>
                </button>
              </form>
            </div>
          `;
        },
      }
    ],
  };

  if (roles) {
    const datatable = $('#roles').KTDatatable(options);

    datatable.on(
      'kt-datatable--on-check kt-datatable--on-uncheck kt-datatable--on-layout-updated',
      function(e) {
        const checkedNodes = datatable.rows('.kt-datatable__row--active').nodes();
        const count = checkedNodes.length;
        $('#kt_datatable_selected_number').html(count);
        if (count > 0) {
          $('#kt_datatable_group_action_form').collapse('show');
        } else {
          $('#kt_datatable_group_action_form').collapse('hide');
        }
      }
    );

    $('#kt_datatable_delete_all').on('click', function (e) {
      e.preventDefault();

      const $bulkDeleteInput = $('#bulk_delete_input');
      let ids = [];
      $bulkDeleteInput.val('');

      const $checkedBoxes = datatable.rows('.kt-datatable__row--active').
      nodes().find('.kt-checkbox--single > [type="checkbox"]').
      map(function(i, chk) {
        // Gather IDs
        const value = $(chk).val();
        ids.push(value);
        return $(chk).val();
      });
      // Set input value
      $bulkDeleteInput.val(ids);

      return false;
    });
  }
}

jQuery(document).ready(function() {
  RolesList();
});
