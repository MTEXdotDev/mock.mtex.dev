<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Users Routes
$app->get('/users', function (Request $request, Response $response) {
    $users = require __DIR__ . '/data/users.php';
    $response->getBody()->write(json_encode($users, JSON_PRETTY_PRINT));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/users/{id}', function (Request $request, Response $response, $args) {
    $users = require __DIR__ . '/data/users.php';
    $id = (int) $args['id'];

    $user = array_values(array_filter($users, fn($u) => $u['id'] === $id));

    if (empty($user)) {
        $error = ['error' => 'User not found'];
        $response->getBody()->write(json_encode($error));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
    }

    $response->getBody()->write(json_encode($user[0], JSON_PRETTY_PRINT));
    return $response->withHeader('Content-Type', 'application/json');
});

// Posts Routes
$app->get('/posts', function (Request $request, Response $response) {
    $posts = require __DIR__ . '/data/posts.php';
    $response->getBody()->write(json_encode($posts, JSON_PRETTY_PRINT));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/posts/{id}', function (Request $request, Response $response, $args) {
    $posts = require __DIR__ . '/data/posts.php';
    $id = (int) $args['id'];

    $post = array_values(array_filter($posts, fn($p) => $p['id'] === $id));

    if (empty($post)) {
        $error = ['error' => 'Post not found'];
        $response->getBody()->write(json_encode($error));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
    }

    $response->getBody()->write(json_encode($post[0], JSON_PRETTY_PRINT));
    return $response->withHeader('Content-Type', 'application/json');
});

// Products Routes
$app->get('/products', function (Request $request, Response $response) {
    $products = require __DIR__ . '/data/products.php';
    $response->getBody()->write(json_encode($products, JSON_PRETTY_PRINT));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get(
    '/products/{id}',
    function (Request $request, Response $response, $args) {
        $products = require __DIR__ . '/data/products.php';
        $id = (int) $args['id'];

        $product = array_values(
            array_filter($products, fn($p) => $p['id'] === $id)
        );

        if (empty($product)) {
            $error = ['error' => 'Product not found'];
            $response->getBody()->write(json_encode($error));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(404);
        }

        $response->getBody()->write(
            json_encode($product[0], JSON_PRETTY_PRINT)
        );
        return $response->withHeader('Content-Type', 'application/json');
    }
);