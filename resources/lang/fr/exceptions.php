<?php

return array (
  'backend' => 
  array (
    'access' => 
    array (
      'users' => 
      array (
        'not_found' => 'Cet utilisateur n\'existe pas.',
        'social_delete_error' => 'Un problème est survenu lors de la suppression du compte de réseau social de l\'utilisateur.',
        'role_needed_create' => 'Vous devez sélectionner au moins un rôle.',
        'create_error' => 'Un problème est survenu lors de la création de l\'utilisateur. Veuillez réessayer.',
        'update_error' => 'Un problème est survenu lors de la mise à jour de l\'utilisateur. Veuillez réessayer.',
        'update_password_error' => 'Un problème est survenu lors du changement du mot de passe de l\'utilisateur. Veuillez réessayer.',
        'cant_deactivate_self' => 'Vous ne pouvez pas désactiver votre propre compte d\'utilisateur.',
        'mark_error' => 'Un problème est survenu lors de la mise à jour de l\'utilisateur. Veuillez réessayer.',
        'already_confirmed' => 'Le compte de cet utilisateur est déjà confirmé.',
        'cant_confirm' => 'Un problème est survenu lors de la confirmation du compte de l\'utilisateur.',
        'not_confirmed' => 'Le compte de cet utilisateur n\'est pas confirmé.',
        'cant_unconfirm_admin' => 'Vous ne pouvez pas infirmer le compte d\'utilisateur du super administrateur.',
        'cant_unconfirm_self' => 'Vous ne pouvez pas infirmer votre propre compte d\'utilisateur.',
        'delete_first' => 'Cet utilisateur doit d\'abord être supprimé avant de pouvoir être supprimé de façon permanente.',
        'delete_error' => 'Un problème est survenu lors de la suppression de l\'utilisateur. Veuillez réessayer.',
        'cant_restore' => 'Cet utilisateur n\'est pas effacé et ne peut être restauré.',
        'restore_error' => 'Un problème est survenu lors de la restauration de l\'utilisateur. Veuillez réessayer.',
        'email_error' => 'Cette adresse email appartient à un autre utilisateur.',
        'cant_delete_own_session' => 'Vous ne pouvez pas supprimer votre propre session.',
        'cant_delete_admin' => 'Vous ne pouvez pas supprimer le compte d\'utilisateur du super administrateur.',
        'cant_delete_self' => 'Vous ne pouvez pas supprimer votre propre compte d\'utilisateur.',
        'role_needed' => 'Vous devez sélectionner au moins un rôle.',
      ),
      'roles' => 
      array (
        'needs_permission' => 'Vous devez sélectionner au moins une permission pour ce rôle.',
        'create_error' => 'Un problème est survenu lors de la création du rôle. Veuillez réessayer.',
        'update_error' => 'Un problème est survenu lors de la mise à jour du rôle. Veuillez réessayer.',
        'cant_delete_admin' => 'Le rôle Administrator ne peut être supprimé.',
        'already_exists' => 'Un rôle portant ce nom existe déjà.',
        'delete_error' => 'Un problème est survenu lors de la suppression du rôle. Veuillez réessayer.',
        'has_users' => 'Ce rôle est associé à des utilisateurs et ne peut être supprimé.',
        'not_found' => 'Ce rôle n\'existe pas.',
      ),
    ),
  ),
  'frontend' => 
  array (
    'auth' => 
    array (
      'email_taken' => 'Cet email est déjà utilisé par un compte existant.',
      'password' => 
      array (
        'change_mismatch' => 'L\'ancien mot de passe est incorrect.',
        'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
      ),
      'confirmation' => 
      array (
        'already_confirmed' => 'Votre compte est déjà confirmé.',
        'mismatch' => 'Votre code de confirmation est invalide.',
        'pending' => 'Votre compte est actuellement en attente de validation.',
        'resend' => 'Votre compte n\'est pas confirmé. Veuillez utiliser le lien qui vous a été envoyé par email, ou <a href=":url">cliquez ici </a> pour recevoir un nouvel email.',
        'success' => 'Votre compte est maintenant confirmé !',
        'resent' => 'Un nouvel email a été envoyé à l\'adresse enregistrée.',
        'created_pending' => 'Votre compte a été créé avec succès et est en attente de validation. Un email vous sera envoyé quand votre compte sera validé.',
        'created_confirm' => 'Votre compte a été créé avec succès.  Un email de confirmation vous a été envoyé.',
        'confirm' => 'Confirmez votre compte !',
        'not_found' => 'Votre code de confirmation n\'existe pas.',
      ),
      'registration_disabled' => 'Registration is currently closed.',
      'deactivated' => 'Votre compte a été désactivé.',
    ),
  ),
);
