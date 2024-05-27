# Mini-projet Authentification

## Étape 0 

Dans le dossier `bre02-php-j7`, créez un dossier `auth`.


## Étape 1 : la base de données

Dans votre PHPMyAdmin vous allez créer une base de données `prenomnom_php_j7` qui contiendra une table `users`.

La table `users` aura 5 champs :

- `id` : int autoincrémenté
- `email` : varchar 255 non null
- `password` : varchar 255 non null
- `first_name` : varchar 255 non null
- `last_name` : varchar 255 non null


## Étape 2 : Connexion à la base de données

Dans un fichier `connexion.php`, créez une connexion à votre base de données.


## Étape 3 : l'index

Dans un fichier `index.php` vous allez démarrer votre session puis require votre fichier `connexion.php`.

Ensuite vous allez récupérer une route dans les paramètres `$_GET` si elle existe et la stocker dans une variable (vous trouverez des exemples dans les corrections de vendredi dernier si besoin). Si elle n'existe pas initialisez votre variable à NULL.

Une fois que c'est fait : faites un require du fichier `layout.phtml`.


## Étape 4 : les fichiers .phtml

Vous allez créer 4 fichiers PHTML :

- `layout.phtml`
- `home.phtml`
- `register.phtml`
- `login.phtml`


## Étape 5 : le fichier layout

Dans votre `layout.phtml`, vous allez mettre la structure de base d'une page HTML (doctype, head, body).

Dans votre body vous allez créer une condition en PHP :

- si votre route est null ou contient `home` : faites un require de `home.phtml`.
- si votre route contient `inscription` : faites un require de `register.phtml`
- si votre route contient `connexion` : faites un require de `login.phtml`


## Étape 6 : home

Votre fichier `home.phtml` va contenir deux liens : 

- Inscription : qui permet d'accéder à la page d'inscription (`index.php?route=inscription`)
- Connexion : qui permet d'accéder à la page de connexion (`index.php?route=connexion`)


## Étape 7 : les fichiers de logique

Dans votre dossier, créer un dossier `logic`, dans lequels vous créerez 2 fichiers :

- `register.php`
- `login.php`


## Étape 8 : inscription

### Étape 8.1 : register.phtml

Votre fichier `register.phtml` va contenir un formulaire dont l'action est le fichier `logic/register.php` et qui permet de créer un nouvel utilisateur. Il devra donc contenir les champs :

- `first_name`
- `last_name`
- `email`
- `password`

Ainsi qu'un bouton de soumission.

### Étape 8.2 : register.php

Dans votre fichier `logic/register.php` vous allez commencer par faire un require de `connexion.php`.
Récupérez ensuite les champs du formulaire d'inscription envoyés par `register.phtml` si ils existent.

Pour le champ du mot de passe, vous allez utiliser `password_hash` pour créer un nouvel utilisateur dans la base de données, avec son mot de passe chiffré.

Une fois que c'est fait, redirigez votre utilisateur vers la page d'accueil en utilisant le code suivant (attention si vous avez fait un echo ou var_dump avant ce code vous aurez une erreur et c'est normal) :

```php
header('Location: index.php?route=home');
```

(Vous pouvez vérifier dans PHPMyAdmin qu'un nouvel utilisateur a bien été créé avec un mot de passe chiffré).


## Étape 9 : connexion

### Étape 9.1 : login.phtml

Votre fichier `login.phtml` va contenir un formulaire dont l'action est le fichier `logic/login.php` et qui permet de connecter un utilisateur. Il devra donc contenir les champs :

- `email`
- `password`

Ainsi qu'un bouton de soumission.

### Étape 9.2 : login.php

Dans votre fichier `logic/login.php` vous allez commencer par faire un `session_start` puis un require de `connexion.php`.
Récupérez ensuite les champs du formulaire de connexion envoyés par `login.phtml` si ils existent.

Faites un requête dans la base de données pour sélectionner l'utilisateur qui a l'email reçu dans le formulaire :

Si cet utilisateur n'existe pas dans la base : faites un echo `<h1>Email incorrect<\h1>`.

Si il existe, utilisez pass_word_verify pour vérifier si le mot de passe en clair reçu dans le formulaire, correspond bien au mot de passe chiffré trouvé dans la base de données.

Si les mots de passe ne correspondent pas : faites un echo `<h1>Mot de passe incorrect<\h1>`.

Si ils correspondent, créez l'entréé `$_SESSION['user']`et stockez-y le nom et prénom de l'utilisateur. Une fois que c'est fait, redirigez votre utilisateur vers la page d'accueil en utilisant le code suivant (attention si vous avez fait un echo ou var_dump avant ce code vous aurez une erreur et c'est normal) :

```php
header('Location: index.php?route=home');
```


## Étape 10 : modifier la home

Dans votre `home.phtml` vous allez ajouter une condition : si votre `$_SESSION` contient un user vous allez lui dire bonjour dans un `<h1>` en utilisant son prénom et son nom.
