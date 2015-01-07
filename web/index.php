<?php
// charge et initialise les bibliothèques globales
require_once '../vendor/autoload.php';
require_once 'model.php';
require_once 'controllers.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$uri = $request->getPathInfo();
if ('/' == $uri)
{
    $response = list_action();
}
elseif ('/show' == $uri && $request->query->has('id'))
{
    $response = show_action($request->query->get('id'));
}
else
{
    $html = '<html><body><h1>Page Not Found</h1></body></html>';
    $response = new Response(404);
}

// affiche les entêtes et envoie la réponse
$response->send();
