---
theme: theme.json
author: Gaellan
date: May 27th, 2024
paging: Page %d sur %d
---

# Initiation au PHP

## Plan du cours

### Les sessions en PHP

### Les cookies en PHP

### Chiffrement et déchiffrement

---

# Les sessions en PHP

Après `$_GET`  et `$_POST` nous allons maintenant manipuler une nouvelle variable superglobale : `$_SESSION`.


## À quoi sert la session ?

La session sert à créer et stocker des variables, côté serveur qui sont disponibles dans tous les fichiers de votre site.

C'est très utile par exemple, pour gérer la connexion sur un site, et c'est comme ça que nous allons principalement l'utiliser.


## Démarrer une session

Avant de faire quoi que ce soit dans votre `index.php`, y compris avant les `require`, il va falloir démarrer une session. Pour cela on utilise une fonction mise à notre disposition par PHP :

```php
session_start();
```

## Stocker des informations

`$_SESSION` est une superglobale dans laquelle vous pouvez stocker ce que vous voulez, il suffit de créér une nouvelle clé dans le tableau associatif.

```php
$_SESSION["user"] = "John Doe";
```

vous pouvez stocker toute sorte de données, y compris des objets.

```php
$user = new User("John", "Doe");

$_SESSION["user"] = $user;
```

Ceci dit pour des questions de performance, essayez de réduire ce que vous stockez. Stocker une chaine de caractère est plus économe que de stocker un objet complet.

---

# La session en PHP (suite)

## Lire des informations

`$_SESSION` est un tablau associatif, vous pouvez donc lire les données comme vous le feriez pour un tableau associatif classique.

```php
$_SESSION["first_name"] = "John";
$_SESSION["last_name"] = "Doe";

echo $_SESSION["first_name"]; // John
echo $_SESSION["last_name"]; // Doe
```


## Stopper une session

Lorsque vous n'avez plus besoin de votre session (par exemple si votre utilisateur se déconnecte), vous allez utiliser la fonction `session_destroy();`.

```php
session_destroy();
```


## Combien de temps dure une session ?

En théorie, si on utilise pas `session_destroy()`, une session dure 180 minutes (3 heures) mais en pratique cela dépend de la configuration de votre serveur.

---

# Les Cookies en PHP

## Qu'est-ce qu'un cookie ?

C'est un petit fichier, qui a une durée de vie limitée que l'on stocke dans le navigateur de l'utilisateur et que l'on peut lire ensuite.

## À quoi ça sert ?

Principalement à stocker des informations de configuration ou de préférences, un pseudo à utiliser, un thème, une taille de police etc etc.

## Créer un cookie en PHP

Pour créer un cookie utilisez la fonction `setcookie` (la doc : https://www.php.net/manual/fr/function.setcookie.php).

```php
setcookie("3waNickname", "Turlututu"); // le nom du cookie puis la valeur du cookie
```

## Afficher un cookie en PHP

Pour afficher un cookie, vous allez utiliser une superglobale : `$_COOKIE`. 

```php
echo $_COOKIE["3waNickname"];
```

## Supprimer un cookie

Pour supprimer un cookie il va falloir le retirer de la superglobale :

```php
unset($_COOKIE["3waNickname"]);
```

---

# Chiffrement et déchiffrement

Parce que ce serait un gros problème de sécurité, nous n'allons pas stocker des mots de passe en clair dans notre base de données. Nous allons utiliser les fonctions de chiffrement et déchiffrement fournies par PHP.


## Chiffrer un mot de passe

Utilisez la fonction `password_hash()` : https://www.php.net/manual/en/function.password-hash.php.

Un exemple d'utilisation :

```php
<?php 

$password = "P@ssw0rD";

$hash = password_hash($password, PASSWORD_DEFAULT); // l'algo de chiffrement par défaut c'est bcrypt qui fait très bien son travail.

echo "$hash<br>";

// je peux maintenant stocker ce mot de passe chiffré dans ma base de données

?>

```

Dans l'exemple ci dessus, la variable `$hash` contient votre mot de passe une fois chiffré.


## Déchiffrer un mot de passe

Utilisez la fonction : https://www.php.net/manual/en/function.password-verify.php

Un exemple d'utilisation :

```php

// ici j'ai récupéré le contenu de ma variable $hash depuis la base de données et $password depuis un formulaire

$isPasswordCorrect = password_verify($password, $hash);

if($isPasswordCorrect === true)
{
	// le mot de passe est le bon
}
else
{
	// erreur de mot de passe
}

```
