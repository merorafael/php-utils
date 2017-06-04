Mero Utils
==========

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

$var = new Collection([
    1,
    2,
    3,
]);

$var->collect(function($it) {
    return $it * 3;
}); // Will return [3, 6, 9]
```
 
