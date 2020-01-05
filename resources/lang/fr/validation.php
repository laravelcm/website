<?php

return array (
  'required' => 'Le champ :attribute est obligatoire.',
  'attributes' => 
  array (
    'frontend' => 
    array (
      'first_name' => 'Prénom',
      'last_name' => 'Nom',
      'email' => 'Adresse email',
      'password' => 'Mot de passe',
      'password_confirmation' => 'Confirmation',
      'old_password' => 'Ancien mot de passe',
      'name' => 'Nom complet',
      'phone' => 'Téléphone',
      'message' => 'Message',
      'avatar' => 'Avatar',
      'new_password' => 'Nouveau mot de passe',
      'new_password_confirmation' => 'Confirmation du nouveau mot de passe',
      'timezone' => 'Fuseau Horaire',
    ),
    'backend' => 
    array (
      'access' => 
      array (
        'roles' => 
        array (
          'name' => 'Nom',
          'associated_permissions' => 'Permissions associées',
          'sort' => 'Ordre',
        ),
        'users' => 
        array (
          'first_name' => 'Prénom',
          'last_name' => 'Nom',
          'email' => 'Adresse email',
          'password' => 'Mot de passe',
          'password_confirmation' => 'Confirmation du mot de passe',
          'active' => 'Actif',
          'confirmed' => 'Confirmé',
          'send_confirmation_email' => 'Envoyer un email de confirmation',
          'associated_roles' => 'Rôles associés',
          'name' => 'Nom complet',
          'other_permissions' => 'Autres permissions',
        ),
        'permissions' => 
        array (
          'associated_roles' => 'Rôles associés',
          'dependencies' => 'Dépendances',
          'display_name' => 'Nom affiché',
          'group' => 'Groupe',
          'group_sort' => 'Ordre du groupe',
          'groups' => 
          array (
            'name' => 'Nom du groupe',
          ),
          'name' => 'Nom complet',
          'first_name' => 'Prénom',
          'last_name' => 'Nom',
          'system' => 'Système',
        ),
      ),
    ),
  ),
  'accepted' => 'Le champ :attribute doit être accepté.',
  'active_url' => 'Le champ :attribute n\'est pas une URL valide.',
  'after' => 'Le champ :attribute doit être une date postérieure au :date.',
  'after_or_equal' => 'Le champ :attribute doit être une date postérieure ou égale au :date.',
  'alpha' => 'Le champ :attribute doit seulement contenir des lettres.',
  'alpha_dash' => 'Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.',
  'alpha_num' => 'Le champ :attribute doit seulement contenir des chiffres et des lettres.',
  'array' => 'Le champ :attribute doit être un tableau.',
  'before' => 'Le champ :attribute doit être une date antérieure au :date.',
  'before_or_equal' => 'Le champ :attribute doit être une date antérieure ou égale au :date.',
  'between' => 
  array (
    'numeric' => 'La valeur de :attribute doit être comprise entre :min et :max.',
    'file' => 'La taille du fichier de :attribute doit être comprise entre :min et :max kilo-octets.',
    'string' => 'Le texte :attribute doit contenir entre :min et :max caractères.',
    'array' => 'Le tableau :attribute doit contenir entre :min et :max éléments.',
  ),
  'boolean' => 'Le champ :attribute doit être vrai ou faux.',
  'confirmed' => 'Le champ de confirmation :attribute ne correspond pas.',
  'date' => 'Le champ :attribute n\'est pas une date valide.',
  'date_equals' => 'The :attribute must be a date equal to :date.',
  'date_format' => 'Le champ :attribute ne correspond pas au format :format.',
  'different' => 'Les champs :attribute et :other doivent être différents.',
  'digits' => 'Le champ :attribute doit contenir :digits chiffres.',
  'digits_between' => 'Le champ :attribute doit contenir entre :min et :max chiffres.',
  'dimensions' => 'Les dimensions de l\'image :attribute ne sont pas conformes.',
  'distinct' => 'Le champ :attribute doit être une valeur unique.',
  'email' => 'Le champ :attribute doit être une adresse email valide.',
  'ends_with' => 'The :attribute must end with one of the following: :values',
  'exists' => 'Le champ :attribute n\'existe pas.',
  'file' => 'Le champ :attribute doit être un fichier.',
  'filled' => 'Le champ :attribute est obligatoire.',
  'gt' => 
  array (
    'numeric' => 'The :attribute must be greater than :value.',
    'file' => 'The :attribute must be greater than :value kilobytes.',
    'string' => 'The :attribute must be greater than :value characters.',
    'array' => 'The :attribute must have more than :value items.',
  ),
  'gte' => 
  array (
    'numeric' => 'The :attribute must be greater than or equal :value.',
    'file' => 'The :attribute must be greater than or equal :value kilobytes.',
    'string' => 'The :attribute must be greater than or equal :value characters.',
    'array' => 'The :attribute must have :value items or more.',
  ),
  'image' => 'Le champ :attribute doit être une image.',
  'in' => 'Le champ :attribute est invalide.',
  'in_array' => 'Le champ :attribute n\'existe pas dans :other.',
  'integer' => 'Le champ :attribute doit être un entier.',
  'ip' => 'Le champ :attribute doit être une adresse IP valide.',
  'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
  'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
  'json' => 'Le champ :attribute doit être un document JSON valide.',
  'lt' => 
  array (
    'numeric' => 'The :attribute must be less than :value.',
    'file' => 'The :attribute must be less than :value kilobytes.',
    'string' => 'The :attribute must be less than :value characters.',
    'array' => 'The :attribute must have less than :value items.',
  ),
  'lte' => 
  array (
    'numeric' => 'The :attribute must be less than or equal :value.',
    'file' => 'The :attribute must be less than or equal :value kilobytes.',
    'string' => 'The :attribute must be less than or equal :value characters.',
    'array' => 'The :attribute must not have more than :value items.',
  ),
  'max' => 
  array (
    'numeric' => 'La valeur de :attribute ne peut être supérieure à :max.',
    'file' => 'La taille du fichier de :attribute ne peut pas dépasser :max kilo-octets.',
    'string' => 'Le texte de :attribute ne peut contenir plus de :max caractères.',
    'array' => 'Le tableau :attribute ne peut contenir plus de :max éléments.',
  ),
  'mimes' => 'Le champ :attribute doit être un fichier de type : :values.',
  'mimetypes' => 'Le champ :attribute doit être un fichier de type : :values.',
  'min' => 
  array (
    'numeric' => 'La valeur de :attribute doit être supérieure ou égale à :min.',
    'file' => 'La taille du fichier de :attribute doit être supérieure à :min kilo-octets.',
    'string' => 'Le texte :attribute doit contenir au moins :min caractères.',
    'array' => 'Le tableau :attribute doit contenir au moins :min éléments.',
  ),
  'not_in' => 'Le champ :attribute sélectionné n\'est pas valide.',
  'not_regex' => 'The :attribute format is invalid.',
  'numeric' => 'Le champ :attribute doit contenir un nombre.',
  'present' => 'Le champ :attribute doit être présent.',
  'regex' => 'Le format du champ :attribute est invalide.',
  'required_if' => 'Le champ :attribute est obligatoire lorsque :other est :value.',
  'required_unless' => 'Le champ :attribute est obligatoire sauf si :other est :value.',
  'required_with' => 'Le champ :attribute est obligatoire lorsque :values a une valeur.',
  'required_with_all' => 'Le champ :attribute est obligatoire lorsque :values existe.',
  'required_without' => 'Le champ :attribute est obligatoire lorsque :values n\'a pas de valeur.',
  'required_without_all' => 'Le champ :attribute est obligatoire lorsque :values n\'existe pas.',
  'same' => 'Les champs :attribute et :other doivent être identiques.',
  'size' => 
  array (
    'numeric' => 'Le champ :attribute doit avoir une taille de :size.',
    'file' => 'La taille du fichier de :attribute doit être de :size kilo-octets.',
    'string' => 'Le texte de :attribute doit contenir :size caractères.',
    'array' => 'Le tableau :attribute doit contenir :size éléments.',
  ),
  'starts_with' => 'The :attribute must start with one of the following: :values',
  'string' => 'Le champ :attribute doit être une chaîne de caractères.',
  'timezone' => 'Le champ :attribute doit être un fuseau horaire valide.',
  'unique' => 'La valeur du champ :attribute est déjà utilisée.',
  'uploaded' => 'Le fichier du champ :attribute n\'a pu être téléchargé.',
  'url' => 'Le format de \'URL de :attribute n\'est pas valide.',
  'uuid' => 'The :attribute must be a valid UUID.',
  'custom' => 
  array (
    'attribute-name' => 
    array (
      'rule-name' => 'custom-message',
    ),
  ),
);
