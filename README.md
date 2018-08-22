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

Il est possible que j'ajoute des branches pour agrémenter le système.

 - Connexion
	 - Checkbox "Se souvenir"
	 - Mot de passe oublié
 - Inscription
	 - Validation par email
 - Profil utilisateur
	 - Modification du mot de passe
	 - Modification de l'adresse email

# Demonstration of a registration system and connection on Symfony 4

To avoid using FOSUserBundle here is a starting point for a registration and login system that can be useful to start a project that requires user space.

# How to use
You must configure the file **.env**

    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

Creation of the database

    php bin/console d:d:c

Creating the table

    php bin/console d:s:u -f

Launching the server

    php -S 127.0.0.1:8000 -t public

## Upcoming

I may add branches to enhance the system.

 - Connection
	 - Checkbox "Remember"
	 - Forgot your password?
 - Registration
 	 - Validation by mail
 	 - User profile
 	 - Changing the password
 	 - Changing the email address
