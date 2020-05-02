"use strict";

const UsersList = () => {
  const users = document.getElementById('users_datatable');
  let loggedUserId = null;

  if (users) {
    loggedUserId = parseInt(users.getAttribute('data-logged-id'));
  }

  const options = {
    // datasource definition
    data: {
      type: 'remote',
      source: {
        read: {
          method: 'GET',
          url: route('api.users.index').template,
          map: function(raw) {
            return typeof raw.data !== 'undefined' ? raw.data : raw;
          },
        }
      },
      pageSize: 10,
      serverPaging: true,
      serverFiltering: true,
      serverSorting: true
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
        field: 'full_name',
        title: 'FullName',
        sortable: true,
        template: function (row) {
          return `<div class="kt-user-card-v2">
            <div class="kt-user-card-v2__pic">
              <img src="${row.picture}" alt="photo" width="40px" height="40px">
            </div>
            <div class="kt-user-card-v2__details">
              <a href="javascript:;" class="kt-user-card-v2__name">${row.full_name}</a>
              <span class="kt-user-card-v2__desc">${row.email}</span>
            </div>
          </div>`;
        }
      },
      {
        field: 'confirmed',
        title: 'Confirmed',
        sortable: true,
        template: function (row) {
          if (row.confirmed === true) {
            return `<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Yes</span>`
          } else {
            return `<span class="kt-badge kt-badge--info kt-badge--inline kt-badge--pill">No</span>`
          }
        }
      },
      {
        field: 'active',
        title: 'Active',
        sortable: true,
        template: function (row) {
          if (row.active === true) {
            return `<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Yes</span>`
          } else {
            return `<span class="kt-badge kt-badge--info kt-badge--inline kt-badge--pill">No</span>`
          }
        }
      },
      {
        field: 'roles_label',
        title: 'Roles'
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
               ${(loggedUserId !== row.id) ?
                `
                  <a href="${route('admin.auth.user.edit', { id: row.id })}" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">
                      <i class="flaticon2-edit"></i>
                  </a>
                  <form action='${route('admin.auth.user.destroy', {id: row.id})}' method='POST' id="delete_item_${ row.id }" name='delete_item'>
                      <input type='hidden' name='_method' value='delete'>
                      <input type='hidden' name='_token' value='${$('meta[name="csrf-token"]').attr('content')}'>
                      <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Delete">
                        <i class="flaticon-delete"></i>
                      </button>
                  </form>
                  <div class="dropdown">
                      <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">
                        <i class="flaticon-more-1"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav">
                          <li class="kt-nav__item">${row.login_as_button}</li>
                          <li class="kt-nav__item">${row.show_button}</li>
                          <li class="kt-nav__item">${row.status_button}</li>
                          <li class="kt-nav__item">${row.change_password_button}</li>
                        </ul>
                      </div>
                  </div>
                `: ''}
            </div>
          `;
        },
      }
    ],
  };

  if (users) {
    const datatable = $('#users_datatable').KTDatatable(options);

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
  UsersList();
});
