
# constants Manager

##### Enables you to organize and structure document paths more elegantly.

---

### Here's a quick example:

```php
<?php

    use Coco\constants\ConstantsManager;

    require '../vendor/autoload.php';

    const PUBLIC_PATH = 'public/';
    const FILE_BASE_PATH = 'files/';
    const UPLOAD_PATH    = '<PUBLIC_PATH>upload/';
    const DOC_PATH       = '<UPLOAD_PATH>doc/';

    ConstantsManager::initSystemConstants();

    $res = ConstantsManager::getAllConstants();

    // public/upload/doc/hello/files/
    echo ConstantsManager::dynamicParsing('<DOC_PATH>hello/<FILE_BASE_PATH>');
    echo PHP_EOL;

    // /public/
    echo ConstantsManager::getValue('PUBLIC_PATH');
    echo PHP_EOL;

    // /public/upload/doc/
    echo ConstantsManager::getValue('DOC_PATH');
    echo PHP_EOL;

    // public/upload/doc/foo/bar/
    echo ConstantsManager::getValue('DOC_PATH', function($value) {
        return $value . 'foo/bar/';
    });
    echo PHP_EOL;

    // public/upload/doc/aaa/bbb/ccc
    echo ConstantsManager::getValue('DOC_PATH', function($value) {
        return ConstantsManager::toDirectorySeparator($value) . 'aaa/bbb/ccc';
    });
    echo PHP_EOL;

```


```php
<?php
    use Coco\constants\ConstantsManager;

    require '../vendor/autoload.php';

    const PUBLIC_PATH = '/public/';

    ConstantsManager::initSystemConstants();

    $res = ConstantsManager::getAllConstants();

    var_export($res);

```

## Installation

You can install the package via composer:

```bash
composer require coco-project/constants --no-dev
```

## Testing

``` bash
composer test
```

## License

---

MIT
