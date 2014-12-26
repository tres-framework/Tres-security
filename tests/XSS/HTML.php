<?php

use Tres\security\XSS\HTML as HTMLXSS;

require_once(dirname(__DIR__).'/init.php');

$secureStr = "<script>alert('Hello good world!');</script>";
$secureStr = HTMLXSS::escape($secureStr);

$insecureStr = "<script>alert('Hello evil world!');</script>";

echo $secureStr;
echo $insecureStr;
