<?php

use Tres\security\CSRF\CSRF;

require_once(dirname(__DIR__).'/init.php');

session_start();

if(isset($_POST['form_1_submit'])){
    echo 'Form 1 was submitted.<br />';
    echo 'CSRF token was: '.CSRF::generateToken(false).'<br />';
    
    var_dump(CSRF::validateToken($_POST['token'], false));
}

if(isset($_POST['form_2_submit'])){
    echo 'Form 2 was submitted.<br />';
    echo 'CSRF token was: '.CSRF::generateToken(false).'<br />';
    
    var_dump(CSRF::validateToken($_POST['csrf_token']));
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <title>CSRF Test</title>
    </head>
    <body>
        <h1>CSRF Test</h1>
        
        <h2>Keep token</h2>
        <form method="POST">
            <input type="hidden" name="token" value="<?php echo CSRF::generateToken(null); ?>" />
            <input type="submit" name="form_1_submit" value="Submit form 2" />
        </form>
        
        <h2>Reset token</h2>
        <form method="POST">
            <?php echo CSRF::generateToken(); ?>
            <input type="submit" name="form_2_submit" value="Submit form 2" />
        </form>
    </body>
</html>
