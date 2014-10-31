<?php

namespace packages\Tres\security\XSS {
    
    /**
     * JavaScript XSS class.
     * 
     * This class is meant for JavaScript and JavaScript only.
     */
    class JS {
        
        protected static $_supportedEncoding = [
            'UTF8',
            'UTF-8'
        ];
        
        /**
         * Escapes data to be safe for JavaScript output.
         * 
         * @param  string $str      The string being converted.
         * @param  int    $flags    (Optional) Specifies how to handle quotes.
         * @param  string $encoding (Optional) Defines encoding used in conversion.
         * @return string           The converted string.
         */
        public static function escape($str, $flags = 0, $encoding = 'UTF-8'){
            if(in_array(strtoupper($encoding), self::$_supportedEncoding){
                return json_encode($str, $flags);
            } else {
                throw new XSSException('Encoding not supported.');
            }
        }
        
    }
    
}
