Mero Utils
==========

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/24892481-5df4-476e-b25c-67ca7fee6bd4/mini.png)](https://insight.sensiolabs.com/projects/24892481-5df4-476e-b25c-67ca7fee6bd4)
[![Build Status](https://travis-ci.org/merorafael/php-utils.svg?branch=master)](https://travis-ci.org/merorafael/php-utils)
[![Coverage Status](https://coveralls.io/repos/github/merorafael/php-utils/badge.svg?branch=master)](https://coveralls.io/github/merorafael/php-utils?branch=master)
[![Latest Stable Version](https://poser.pugx.org/mero/utils/v/stable.svg)](https://packagist.org/packages/mero/utils)
[![Total Downloads](https://poser.pugx.org/mero/utils/downloads.svg)](https://packagist.org/packages/mero/utils)
[![License](https://poser.pugx.org/mero/utils/license.svg)](https://packagist.org/packages/mero/utils)

Library with features that increase productivity

Instalation with composer
-------------------------

1. Open your project directory;
2. Run `composer require mero/utils` to add `Mero Utils`
 in your project vendor.

Type classes
------------

#### Collection

Object type extended array data type with additional methods.

##### count()

Counts all elements in the collection.

```php
<?php

use Mero\Utils\Collection;

$var = new Collection();
$var[] = 'First element';
$var[] = 'Second element';

$var->count(); // Will return 2
```

##### find()

Finds the first value matching the closure condition.

```php
<?php

use Mero\Utils\Collection;

$var = new Collection([
    'First element',
    'Second element',
    1,
    4,
    10,
]);

$var->find(function($it) {
    return $it == 'Second element';
}); // Will return 'Second element'
```

##### findAll()

Finds all values matching the closure condition.

```php
<?php

use Mero\Utils\Collection;

$var = new Collection([
    'First element',
    'Second element',
    1,
    4,
    10,
    'Second element',
    'Second element',
]);

$var->findAll(function($it) {
    return $it == 'Second element';
}); // Will return ['Second element', 'Second element', 'Second element']
```

##### collect()

Iterates through this collection transforming each entry into a new value using the
transform closure returning a list of transformed values.

```php
<?php

use Mero\Utils\Collection;

$var = new Collection([1, 2, 3]);

$var->collect(function($it) {
    return $it * 3;
}); // Will return [3, 6, 9]
```

##### each()

Iterates through an Collection, passing each item to the given closure.

```php
<?php

use Mero\Utils\Collection;

$var = new Collection([1, 2, 3]);

$var->each(function($it) {
    echo $it."\n";
});

// Will return:
// 1
// 2
// 3
```

##### eachWithIndex()

Iterates through an Collection, passing each item to the given closure.

```php
<?php

use Mero\Utils\Collection;

$var = new Collection(['Element1', 'Element2', 'Element3']);

$var->eachWithIndex(function($it, $index) {
    echo $index." - ".$it."\n";
});

// Will return:
// 0 - Element1
// 1 - Element2
// 2 - Element3
```
 
