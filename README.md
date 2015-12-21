ClasticHttpCacheBundle
======================

Http Cache invalidation for [Clastic](https://github.com/Clastic/Clastic).

Install
-------

This bundle is available on Packagist. You can install it using Composer:

```shell
$ composer require clastic/http-cache-bundle
```

Then add the bundle to your application:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new FOS\HttpCacheBundle\FOSHttpCacheBundle(),
        new Clastic\HttpCacheBundle\ClasticHttpCacheBundle(),
        // ...
    );
}
```

Configure
---------

Read the [following documentation](http://foshttpcachebundle.readthedocs.org/en/latest/reference/configuration/proxy-client.html)
to configure the FOSHttpCacheBundle.



Contributing
------------

> All code contributions - including those of people having commit access - must
> go through a pull request and approved by a core developer before being
> merged. This is to ensure proper review of all the code.
>
> Fork the project, create a feature branch, and send us a pull request.
>
> To ensure a consistent code base, you should make sure the code follows
> the [Coding Standards](http://symfony.com/doc/2.0/contributing/code/standards.html)
> which we borrowed from Symfony.
> Make sure to check out [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer) as this will help you a lot.

If you would like to help, take a look at the [list of issues](https://github.com/Clastic-Contrib/GoogleAnalyticsBundle/issues).

Author and contributors
-----------------------

Dries De Peuter - <dries@nousefreak.be> - <http://nousefreak.be>

See also the list of [contributors](https://github.com/Clastic-Contrib/GoogleAnalyticsBundle/contributors) who participated in this project.

License
-------

This project is licensed under the MIT license.