<?php

require_once( "../inc/env.inc.php" );
mkenv("../.env");
require_once( "../inc/routes.inc.php" );
require_once( "../inc/function.parse_request.inc.php" );

// Parse request
$request = parse_request();					

require_once '../vendor/autoload.php';


$__domain = $_SERVER['HTTP_HOST'];
$__protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";


// Set path to templates
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '../storage/cache',
));
$twig->addFunction(new Twig\TwigFunction('env','_env'));

// Route exists?
if( array_key_exists($request['path'],$routes) ) {
    $route = $routes[$request['path']];
	echo $twig->render( $route['template'], // 'index.twig',
                         array_merge( $route['params'], array('__domain' => $__domain, '__protocol' => $__protocol ) )
	);
} else if( $request['path'] == '/sitemap.txt' ) {
    header( 'Content-Type: text/plain' );
    echo $twig->render( 'sitemap.twig',
                        array_merge( array( 'routes' => $routes ), array('__domain' => $__domain, '__protocol' => $__protocol ) )
	);
} else {
	echo $twig->render( 'error.twig', array( 'code' => 404, 'message' => 'Not found.' ) );
}

