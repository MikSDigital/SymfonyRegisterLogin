# Démonstration d'un système d'inscription et connexion sur Symfony 4

Pour éviter d'utiliser FOSUserBundle voici un point de départ pour un système d'enregistrement et connexion qui peut être utile pour commencer un projet qui nécessite un espace utilisateur.

# Utilisation
Vous devez configurer le fichier **.env**

    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

Création de la base de données

    php bin/console d:d:c

Création de la table

    php bin/console d:s:u -f

Lancement du serveur

    php -S 127.0.0.1:8000 -t public

## A venir

Il est possible que j'ajoute des issues pour agrémenter le système.

 - Connexion
	 - Checkbox "Se souvenir"
	 - Mot de passe oublié
 - Inscription
	 - Validation par email
 - Profil utilisateur
	 - Modification du mot de passe
	 - Modification de l'adresse email
