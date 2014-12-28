# Tres security

This is the security package used for [Tres Framework](https://github.com/tres-framework/Tres). 
This is a stand-alone package, which means that it can also be used without the framework.

This package contains:
- XSS protection
    - HTML
    - JavaScript
- CSRF protection

## Requirements
- PHP 5.4 or greater.
- openssl module for CSRF token generation

## Documentation
### CSRF
To implement CSRF Tokens in your page you need to include the CSRF\Token class.
```php
use Tres\security\CSRF\Token;
```
Next start the session for the current page, if you do not a CSRFException will be thrown.
```php
session_start();
```
Next create a basic php check for the form POST/GET and then use `Token::validate()`.
```php
if(isset($_POST['exmaple'])){
    if(Token::validate($_POST['csrf_token'])) {
        // Valid token, execute form
    } else {
        // CSRF attack, abort
    }
}
```
Finally we generate a token for an existing input using `Token::generate()`.
```html
<form method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>" />
    <input type="submit" name="example" value="Submit" />
</form>
```
Or we can generate a HTML input field use `Token::input()` which will also generate a new token.
```html
<form method="POST">
    <?php echo Token::input(); ?>
    <!--
        Generates:
        <input type="hidden" name="csrf_token" value="the_csrf_string" />
    -->
    <input type="submit" name="form_2_submit" value="Submit form 2" />
</form>
```

All together:

```php
<?php
use Tres\security\CSRF\Token;

session_start();

if(isset($_POST['exmaple'])){
    if(Token::validate($_POST['csrf_token'])) {
        // Valid token, execute form
    } else {
        // CSRF attack, abort
    }
}
?>
<form method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>" />
    <input type="submit" name="example" value="Submit" />
</form>
```

### XSS
*Coming soon.*