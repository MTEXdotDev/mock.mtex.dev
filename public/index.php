<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

// CORS Middleware
$app->add(function (Request $request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'Content-Type')
        ->withHeader('Access-Control-Allow-Methods', 'GET, OPTIONS');
});

// API Documentation
$app->get('/', function (Request $request, Response $response) {
    $docs = [
        'service' => 'MTEX Mock API',
        'version' => '1.0.0',
        'description' => 'Simple REST API providing sample JSON data',
        'endpoints' => [
            'GET /' => 'API documentation',
            'GET /users' => 'List all users',
            'GET /users/{id}' => 'Get user by ID',
            'GET /posts' => 'List all posts',
            'GET /posts/{id}' => 'Get post by ID',
            'GET /products' => 'List all products',
            'GET /products/{id}' => 'Get product by ID',
        ],
        'examples' => [
            'https://mock.mtex.dev/users',
            'https://mock.mtex.dev/users/1',
            'https://mock.mtex.dev/posts',
            'https://mock.mtex.dev/products',
        ],
    ];

    $response->getBody()->write(json_encode($docs, JSON_PRETTY_PRINT));
    return $response->withHeader('Content-Type', 'application/json');
});

require __DIR__ . '/../src/routes.php';

$app->run();