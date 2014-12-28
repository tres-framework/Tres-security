<?php

spl_autoload_register(function($class){
    $dirs = [
        dirname(__DIR__).'/src/'
    ];
    
    foreach($dirs as $dir){
        $file = str_replace('\\', '/', rtrim($dir, '/').'/'.$class.'.php');
        
        if(is_readable($file)){
            require_once($file);
            break;
        }
    }
});

set_exception_handler(function($e){
    echo '<b>Exception:</b> '.$e->getMessage();
});
