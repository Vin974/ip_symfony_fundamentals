Symfony 2 - Fondamentaux (v2.8)
=======

https://paper.dropbox.com/doc/Symfony-2-Fondamentaux-HTAADshbfYvTf8AgD9J1M

##Structure globale
1. A quoi sert le dossier `app/` ?
    > Le dossier `app/` contient la configuration de l'application, les templates et les translations.

2. Que contient bootstrap.php.cache ?
    > C'est un fichier de "cache" qui contient la déclaration de plusieurs classes ceci pour un besoin de performances.

3. Comment se génère ce fichier ? (Désolé pour la question  :p)
    > Avec `composer install`.

4. Que contient `appDevUrlGenerator.php` ?
    > C'est un fichier de cache qui contient l'ensemble des routes définis dans l'application.

5. Pourquoi un dossier `web` ?
    > Pour séparer les sources du projet de ce qu'il dois être disponible en public.

6. Où se trouve le fichier `base.html.twig` et à quoi sert-il ?
    > Ce fichier se trouve à `app/Resources/views/`. Ce template contient la structure html de base pour l'application et sera le parent pour tous les autres templates.

7. A quoi fait référence le dossier `web/bundles/framework/` ?
    > Ce dossier fais références aux assets (css, js, images, etc) de Symfony FrameworkBundle basé dans `vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/public` pour les rendre public.


##Racines de l’application
1. Quelles sont les racines de l’application ? (Par où commence l’exécution)
    > Les fichiers `web/app.php` et `web/app_dev.php`.

2. Comment sont définis les environnements de Symfony ?
    > Dans les racines de l'application en 1er paramètre de AppKernel.

3. Quels environnements sont prédéfinis sur le projet ?
    > dev, prod et test.

4. Quelles url sont actuellement supportées par votre projet (en prod et en dév) ?
    > `php app/console router:debug --env="prod"` ou `php app/console router:debug --env="dev"`

5. Comment régénérer le cache en prod ?
    > `php app/console cache:clear --env=prod`
