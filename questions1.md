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
    > Ce dossier sert à stocker les assets (css, js, images, etc) de Symfony pour les rendre public.


##Racines de l’application
1. Quelles sont les racines de l’application ? (Par où commence l’exécution)
    > Les fichiers `web/app.php` et `web/app_dev.php`.

2. Comment sont définis les environnements de Symfony ?
    > Les environnements de Symfony sont défini par des fichiers spécifique à chacun dans le dossier `app/config/`.

3. Quels environnements sont prédéfinis sur le projet ?
    > dev, prod et test.

4. Quelles url sont actuellement supportées par votre projet (en prod et en dév) ?
    > En prod : 
    ```
    homepage                  :  /
    ```
    > En dev et prod:
    ```
    _wdt                      :  /_wdt/{token}
    _profiler_home            :  /_profiler/
    _profiler_search          :  /_profiler/search
    _profiler_search_bar      :  /_profiler/search_bar
    _profiler_purge           :  /_profiler/purge
    _profiler_info            :  /_profiler/info/{about}
    _profiler_phpinfo         :  /_profiler/phpinfo
    _profiler_search_results  :  /_profiler/{token}/search/results
    _profiler                 :  /_profiler/{token}
    _profiler_router          :  /_profiler/{token}/router
    _profiler_exception       :  /_profiler/{token}/exception
    _profiler_exception_css   :  /_profiler/{token}/exception.css
    _twig_error_test          :  /_error/{code}.{_format}
    ```

5. Comment régénérer le cache en prod ?
    > `php app/console cache:clear --env=prod`
