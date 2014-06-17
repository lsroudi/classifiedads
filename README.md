ClassifiedAdsBundle
=================================

The ClassifiedAdsBundle provide a sample classified ad system for your application based on symfony2

## Installation
### Step 1: Download ClassifiedAdsBundle using composer

``` bash
$ php composer.phar require "lsroudi/classifiedads": "dev-master"
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Lsroudi\ClassifiedAdsBundle\LsroudiClassifiedAdsBundle(),
    );
}
```
