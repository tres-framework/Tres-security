Tres security
=============

This is the security package used for [Tres Framework](https://github.com/tres-framework/Tres). 
This is a stand-alone package, which means that it can be used without the framework.

This package includes:
- XSS protection

## Examples
```php
<?php

use packages\Tres\security\XSS\HTML as HTMLXSS;

$string = '<b>Hello world!</b>';

echo HTMLXSS::specialchars($string);
```

```php
<?php

use packages\Tres\security\XSS\HTML as HTMLXSS;

function e($str, $flags = ENT_QUOTES, $encoding = 'UTF-8'){
    return HTMLXSS::specialchars($str, $flags, $encoding);
}

echo '<a href="link.php">Not a working link</a>';
```
