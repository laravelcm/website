<?php

return [

    'backend' => [
        'access' =>[
            'roles' => [
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',
                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total',
                ],
                'attributes' => [
                    'associated_permissions' => 'Associated Permissions',
                    'display_name' => 'Name',
                    'name' => 'Code',
                    'sort' => 'Sort',
                    'text_display' => 'The name is displayed in the role list on the Administrator form.',
                    'text_code' => 'The slug when you try to access the role object with the API.'
                ],
            ],
            'users' => [
                'active' => 'Active Users',
                'all_permissions' => 'All Permissions',
                'change_password' => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'management' => 'User Management',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',
                'user_actions' => 'User Actions',
                'view' => 'View User',
                'table' => [
                    'confirmed' => 'Confirmed',
                    'created' => 'Created',
                    'email' => 'E-mail Address',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'permissions' => 'Permissions',
                    'abilities' => 'Abilities',
                    'roles' => 'Roles',
                    'social' => 'Social',
                    'total' => 'user total|users total',
                ],
                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history' => 'History',
                    ],
                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Confirmed',
                            'created_at' => 'Created At',
                            'deleted_at' => 'Deleted At',
                            'email' => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Last Updated',
                            'name' => 'Name',
                            'first_name' => 'First Name',
                            'last_name' => 'Last Name',
                            'status' => 'Status',
                            'timezone' => 'Timezone',
                        ],
                    ],
                ],
                'attributes' => [],
            ],
        ],
    ],

    'frontend' => [

    ]

];
