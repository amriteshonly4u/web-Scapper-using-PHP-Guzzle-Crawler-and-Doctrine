<?php
require __DIR__ . '/vendor/autoload.php';

use Guzzle\Http\Client; 
use Guzzle\Http\Exception\ClientErrorResponseException;

$url = 'http://www.biharilegends.com/';
$uri = '/about-us';

$userAgent = 'Mozilla/5.0 (Windows NT 10.0)'
           . ' AppleWebKit/537.36 (KHTML, like Gecko)'
           . ' Chrome/48.0.2564.97'
           . ' Safari/537.36';
$headers = array('User-Agent' => $userAgent);

$client = new Client($url);
$request = $client->get($uri, $headers);

try {
    $response = $request->send();
    $body = $response->getBody(true);
    var_dump($body);
} catch (ClientErrorResponseException $e) {
    $responseBody = $e->getResponse()
                      ->getBody(true);
    echo $responseBody;
}

?>