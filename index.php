<?php
header('Content-type: text/plain; charset=UTF-8');

$input = '';
if (array_key_exists('QUERY_STRING', $_SERVER) && !empty($_SERVER['QUERY_STRING'])) {
    $input = urldecode($_SERVER['QUERY_STRING']);
} else if (array_key_exists('REQUEST_METHOD', $_SERVER) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
}


if (empty($input)) {
?>Ecoji AJAX API
**************

Send your string URL-encoded as the only GET parameter to this service, and it
will reply with the ecoji sequence in utf-8. For example, to encode the string
"example", call:
https://ecoji.dssr.ch/?example

Alternatively, you can send your raw binary, utf-8 or otherwise encoded content
in a POST requests' body.
<?php
    return;
}

header('Access-Control-Allow-Origin: https://fiddle.jshell.net');

require_once 'vendor/autoload.php';
use Rayne\Ecoji\Ecoji;

$ecoji = new Ecoji;
echo $ecoji->encode($input);
