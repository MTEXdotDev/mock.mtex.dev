# MTEX Mock API

Simple REST API providing sample JSON data for testing and prototyping.

## Installation

```bash
composer install
```

## Local Development

```bash
php -S localhost:8000 -t public
```

Visit `http://localhost:8000` to see the API documentation.

## Endpoints

### Documentation

- `GET /` - API documentation

### Users

- `GET /users` - List all users
- `GET /users/{id}` - Get user by ID

### Posts

- `GET /posts` - List all posts
- `GET /posts/{id}` - Get post by ID

### Products

- `GET /products` - List all products
- `GET /products/{id}` - Get product by ID

## Example Requests

```bash
curl https://mock.mtex.dev/users
curl https://mock.mtex.dev/users/1
curl https://mock.mtex.dev/posts
curl https://mock.mtex.dev/products/2
```

## Features

- [x] RESTful API design
- [x] JSON responses
- [x] CORS enabled
- [x] Error handling
- [x] Self-documenting
- [x] No database required

## Tech Stack

- PHP 8.1+
- Slim Framework 4
- PSR-7 HTTP Messages

## License

MIT