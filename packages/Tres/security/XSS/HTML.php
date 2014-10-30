<?php

namespace packages\Tres\security\XSS {
    
    /**
     * HTML XSS class.
     * 
     * This class is meant for HTML and HTML only.
     */
    class HTML {
        
        /**
         * Converts special characters to HTML entities.
         * 
         * @param  string $str      The string being converted.
         * @param  int    $flags    (Optional) Specifies how to handle quotes.
         * @param  string $encoding (Optional) Defines encoding used in conversion.
         * @return string           The converted string.
         */
        public static function specialchars($str, $flags = ENT_QUOTES, $encoding = 'UTF-8'){
            return htmlspecialchars($str, $flags, $encoding);
        }
        
    }
    
}
