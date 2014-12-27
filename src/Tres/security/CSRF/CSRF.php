<?php

namespace Tres\security\CSRF {
    
    use Exception;
    
    class CSRFException extends Exception {}
    
    class CSRF {
        
        /**
         * The name to use in a session.
         */
        const SESSION_NAME = '_CSRF_TOKEN';
        
        /**
         * Checks if everything alright.
         */
        public function __construct(){
            if(session_status() == PHP_SESSION_NONE){
                throw new CSRFException('session_start() isn\'t called yet.');
            }
            
            if(!function_exists('openssl_random_pseudo_bytes')){
                throw new CSRFException('openssl_random_pseudo_bytes() is not available.');
            }
        }
        
        /**
         * Returns a CSRF token. It gets generated if it doesn't already exists.
         * 
         * @param  string $name The name to use for the input. If null, returns token only. 
         * @return string
         */
        public static function generateToken($name = 'csrf_token'){
            $static = new static();
            
            if(!isset($_SESSION[self::SESSION_NAME])){
                $_SESSION[self::SESSION_NAME] = base64_encode(openssl_random_pseudo_bytes(32));
            }
            
            $output = $_SESSION[self::SESSION_NAME];
            
            if($name){
                $output = '<input type="hidden" name="'.$name.'" value="'.$output.'" />'.PHP_EOL;
            }
            
            return $output;
        }
        
        /**
         * Tells whether the provided token is valid.
         * 
         * @param  string $token The token to test.
         * @param  bool   $unset Whether to unset the session or not.
         * 
         * @return bool
         */
        public static function validateToken($token, $unset = true){
            $static = new static();
            
            if(isset($_SESSION[self::SESSION_NAME]) &&
               $token === $_SESSION[self::SESSION_NAME]
            ){
                if($unset){
                    unset($_SESSION[self::SESSION_NAME]);
                }
                
                return true;
            }
            
            return false;
        }
        
    }
    
}
