# Exercices Sessions


## Étape 0

Créez un repository public GitHub avec un README et appelez-le `bre02-php-j7`.
Clonez le dans le dossiers `sites/php` de votre IDE.
Placez-vous dans le dossier `bre02-php-j7` de votre IDE et créez un dossier `sessions`.


## Étape 1 : Utiliser la session

Créez un fichier `index.php` qui avant toute chose démarre la session.

Dans le fichier `index.php` vous allez créer un formulaire qui vous demande de choisir un pseudo, l'action de ce formulaire est un fichier `nickname.php`.

Dans un fichier `nickname.php` vous allez récupérer le pseudo envoyé par le formulaire, et le stocker.

Crééz un fichier `welcome.php`, dans ce fichier, récupérer le pseudo dans la session s'il existe et faites un echo `"Bienvenue " . $pseudo` si il existe et "Bienvenue invité" sinon.

Pour tester si votre exercices fonctionne, faites un run de `welcome.php` avant et après avoir utilisé le formulaire.


## Étape 2 : détruire la session

Dans un fichier `logout.php`, détruisez la session pour affacer toutes les variables de sessions.

Dans votre `index.php` rajoutez le code HTML suivant :

```html
<a href="logout.php">Déconnexion</a>
```

Vous pouvez tester en remplissant le formulaire du pseudo puis en faisant un run de `welcome.php`, vous devrez avoir "Bienvenue + pseudo" après avoir cliqué sur le lien de déconnexion, si vous faites un run de `welcome.php` vous devriez avoir "Bienvenue invité".