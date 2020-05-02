<?php

return array (
  'emails' =>
  array (
    'contact' =>
    array (
      'subject' => 'Nouvelle soumission du formulaire de contact sur :app_name !',
      'email_body_title' => 'Vous avez une nouvelle prise de contact dont voici les détails :',
    ),
    'auth' =>
    array (
      'password_reset_subject' => 'Votre lien de réinitialisation',
      'password_cause_of_email' => 'Vous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour ce compte.',
      'password_if_not_requested' => 'Si vous n\'avez pas effectué cette demande, aucune autre action n\'est requise.',
      'click_to_confirm' => 'Cliquez ici pour confirmer votre compte :',
      'thank_you_for_using_app' => 'Merci d\'utiliser notre application !',
      'account_confirmed' => 'Votre compte a été confirmé.',
      'error' => 'Oups !',
      'greeting' => 'Bonjour !',
      'regards' => 'Salutations,',
      'trouble_clicking_button' => 'Si vous ne pouvez pas cliquer sur le bouton \':action_text\', copiez et collez l\'URL ci-dessous dans un navigateur:',
      'reset_password' => 'Cliquez ici pour réinitialiser votre mot de passe',
    ),
  ),
  'backend' =>
  array (
    'general' =>
    array (
      'are_you_sure' => 'Êtes-vous sûr ?',
      'boilerplate_link' => 'Laravel Cameroun',
      'all_rights_reserved' => 'Tous droits réservés.',
      'continue' => 'Continuer',
      'member_since' => 'Membre depuis',
      'minutes' => ' minutes.',
      'search_placeholder' => 'Rechercher...',
      'timeout' => 'Vous avez été automatiquement déconnecté pour cause d\'inactivité pendant ',
      'close' => 'Fermer',
      'loading' => 'Chargement...',
      'search' => 'Rechercher...',
      'selected' => 'Selectionnés',
      'records' => 'élements',
      'see_all' =>
      array (
        'messages' => 'Voir tous les messages',
        'notifications' => 'Voir toutes les notifications',
        'tasks' => 'Voir les nouvelles tâches',
      ),
      'status' =>
      array (
        'online' => 'En ligne',
        'offline' => 'Hors ligne',
      ),
      'you_have' =>
      array (
        'messages' => '{0} Vous n\'avez pas de message|{1} Vous avez 1 message|[2,Inf] Vous avez :number messages',
        'notifications' => '{0} Vous n\'avez pas de notification|{1} Vous avez 1 notification|[2,Inf] Vous avez :number notifications',
        'tasks' => '{0} Vous n\'avez pas de tâche affectée|{1} Vous avez 1 tâche affectée|[2,Inf] Vous avez :number tâches affectées',
      ),
      'about' => 'Contactez l\'auteur',
    ),
    'access' =>
    array (
      'users' =>
      array (
        'if_confirmed_off' => '(pour le mode sans confirmation)',
        'delete_user_confirm' => 'Êtes-vous sûr de vouloir supprimer cet utilisateur de façon permanente ? Toutes les références à cet utilisateur dans cette application peuvent provoquer des erreurs et cette opération ne peut être annullée.',
        'restore_user_confirm' => 'Restaurer cet utilisateur à son statut original ?',
      ),
    ),
    'dashboard' =>
    array (
      'title' => 'Tableau de bord de l\'administration',
      'welcome' => 'Bienvenue',
      'blank' => 'Page Vide'
    ),
    'welcome' => 'Welcome to the Dashboard',
    'search' =>
    array (
      'empty' => 'Veuillez entrer un terme de recherche.',
      'incomplete' => 'Vous devez mettre en place votre propre logique pour ce système.',
      'title' => 'Résultats de recherche',
      'results' => 'Résultats de la recherche :query',
    ),
  ),
  'frontend' =>
  array (
    'user' =>
    array (
      'password_updated' => 'Mot de passe modifié avec succès.',
      'email_changed_notice' => 'Vous devez confirmer votre nouvelle adresse email avant de pouvoir vous connecter de nouveau.',
      'profile_updated' => 'Profil modifié avec succès.',
      'change_email_notice' => 'Si vous changez votre adresse email vous serez déconnecté jusqu\'à que vous confirmiez votre nouvelle adresse email.',
    ),
    'welcome_to' => 'Bienvenue sur :place',
    'test' => 'Test',
    'general' =>
    array (
      'joined' => 'Membre depuis',
    ),
    'tests' =>
    array (
      'based_on' =>
      array (
        'permission' => 'Helper sur la base de la permissions : ',
        'role' => 'Helper sur la base du rôle : ',
      ),
      'js_injected_from_controller' => 'Javascript injecté depuis un contrôleur',
      'using_blade_extensions' => 'Utilisation des extensions Blade',
      'using_access_helper' =>
      array (
        'array_permissions' => 'L\'utilisateur doit disposer de toutes les permissions d\'un tableau, identifiées soit par leur ID, soit par leur nom.',
        'array_permissions_not' => 'L\'utilisateur doit disposer d\'au moins une des permissions d\'un tableau, identifiées soit par leur ID, soit par leur nom.',
        'array_roles' => 'L\'utilisateur doit disposer de tous les rôles d\'un tableau, identifiés soit par leur ID, soit par leur nom.',
        'array_roles_not' => 'L\'utilisateur doit disposer d\'au moins un des rôles d\'un tableau, identifiés soit par leur ID, soit par leur nom.',
        'permission_id' => 'L\'utilisateur doit disposer d\'une permission identifiée par son ID',
        'permission_name' => 'L\'utilisateur doit disposer d\'une permission identifiée par son nom',
        'role_id' => 'L\'utilisateur doit disposer d\'un rôle identifié par son ID',
        'role_name' => 'L\'utilisateur doit disposer d\'un rôle identifié par son nom',
      ),
      'view_console_it_works' => 'Sur la console du navigateur, vous devriez voir \'it works!\', ce qui est produit depuis le FrontendController@index',
      'you_can_see_because' => 'Vous voyez ce message car vous disposez du rôle \':role\' !',
      'you_can_see_because_permission' => 'Vous voyez ce message car vous disposez de la permission \':permission\' !',
    ),
    'logged' => 'Vous êtes actuellement connecté en tant que ',
    'relogged' => 'Me reconnecter étant '
  ),
);
