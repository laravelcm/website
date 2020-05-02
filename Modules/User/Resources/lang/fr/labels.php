<?php

return [

    'backend' => [
        'access' => [
            'users' => [
                'user_actions' => 'Actions Utilisateur',
                'management' => 'Gestion des utilisateurs',
                'edit' => 'Éditer un utilisateur',
                'all_permissions' => 'Toutes les permissions',
                'deleted' => 'Utilisateurs supprimés',
                'table' => [
                    'total' => 'utilisateur total|utilisateurs total',
                    'abilities' => 'Abilités',
                    'confirmed' => 'Confirmé',
                    'created' => 'Création',
                    'email' => 'Adresse E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Mise à jour',
                    'name' => 'Nom',
                    'first_name' => 'Prénom',
                    'last_name' => 'Nom',
                    'no_deactivated' => 'Pas d\'utilisateurs désactivés',
                    'no_deleted' => 'Pas d\'utilisateurs supprimés',
                    'other_permissions' => 'Autres permissions',
                    'permissions' => 'Permissions',
                    'roles' => 'Rôles',
                    'social' => 'Réseau social',
                ],
                'deactivated' => 'Utilisateurs désactivés',
                'create' => 'Créer un utilisateur',
                'change_password' => 'Modifier le mot de passe',
                'change_password_for' => 'Modifier le mot de passe pour :user',
                'view' => 'Voir un utilisateur',
                'tabs' => [
                    'titles' => [
                        'overview' => 'Résumé',
                        'history' => 'Historique',
                    ],
                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Confirmé',
                            'created_at' => 'Créé le',
                            'deleted_at' => 'Supprimé le',
                            'email' => 'Adresse email',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Mise à jour',
                            'name' => 'Nom complet',
                            'first_name' => 'Prénom',
                            'last_name' => 'Nom',
                            'status' => 'Statut',
                            'timezone' => 'Timezone',
                        ],
                    ],
                ],
                'active' => 'Utilisateurs actifs',
                'no_permissions' => 'Aucune permission',
                'no_roles' => 'Aucun rôle à affecter.',
                'permissions' => 'Permissions',
                'attributes' => [],
            ],
            'roles' => [
                'management' => 'Gestion des rôles',
                'table' => [
                    'total' => 'rôle total|rôles total',
                    'number_of_users' => 'Nombre d\'utilisateurs',
                    'permissions' => 'Permissions',
                    'role' => 'Rôle',
                    'sort' => 'Ordre',
                ],
                'edit' => 'Editer un rôle',
                'create' => 'Créer un rôle',
                'attributes' => [
                    'associated_permissions' => 'Permissions associées',
                    'display_name' => 'Nom',
                    'name' => 'Code',
                    'sort' => 'Sort',
                    'text_display' => 'Le nom qui sera affiché dans la liste des rôles du formulaire Administrateur.',
                    'text_code' => 'Le slug lorsque vous essayez d\'accéder à l\'objet de rôle avec l\'API.'
                ],
            ],
        ],
    ],

    'frontend' => [

    ]

];
