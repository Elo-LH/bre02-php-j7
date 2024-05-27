# Exercices Hash

## Étape 0

Placez-vous dans le dossier `bre02-php-j7` de votre IDE et créez un dossier `hash`.


## Étape 1 : Chiffrer un mot de passe

Créez un fichier `choose_password.php` dans lequel vous mettrez un formulaire HTML permettant de saisir un mot de passe. L'action de ce formulairre sera un autre fichier `hash_password.php`.

Dans `hash_password.php`, récupérez le mot de passe du formulaire, utiliser la fonction `password_hash` vue dans le cours pour chiffrer ce mot de passe et affichez le résultat. Notez le mot de passe d'origine et sa version chiffré quelque part.


## Étape 2 : Tester le mot de passe

Créez un fichier `test_password.php` qui contient un formulaire HTML permettant e aisir un mot de passe en clair et sa version chiffrée. Láction de ce formulaire est un autre fichier : `decrypt_password.php`.

Dans `decrypt_password.php`, récupérez les deux mots de passe du formulaire et comparez-les en utilisant la fonction `password_verify` vue dans le cours. Si les mots de passe correspondent afichez "Mot de passe correct", sinon "Mot de passe erroné".