<?php

use Tres\security\XSS\JS as JSXSS;

require_once(dirname(__DIR__).'/init.php');

$secureStr = '"x"; alert("Hello good world!");';
$secureStr = JSXSS::escape($secureStr);

$insecureStr = '"x"; alert("Hello evil world!");';

echo 'var securePHPVal = '.$secureStr.';<br />';
echo 'var insecurePHPVal = '.$insecureStr.';<br />';
?>

<script type="text/javascript">
var securePHPVal = <?php echo $secureStr; ?>;
var insecurePHPVal = <?php echo $insecureStr; ?>;
</script>
