<?php

namespace packages\Tres\security\XSS {
    
    /**
     * HTML XSS class.
     * 
     * This class is meant for HTML and HTML only.
     */
    class HTML {
        
        /**
         * Escapes data to be safe for HTML output.
         * 
         * @param  string $str      The string being converted.
         * @param  int    $flags    (Optional) Specifies how to handle quotes.
         * @param  string $encoding (Optional) Defines encoding used in conversion.
         * @return string           The converted string.
         */
        public static function escape($str, $flags = ENT_QUOTES, $encoding = 'UTF-8'){
            return htmlspecialchars($str, $flags, $encoding);
        }
        
    }
    
}
