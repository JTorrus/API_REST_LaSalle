<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response) {

});

$app->get('/getAll', function (Request $request, Response $response) {

});

$app->get('/getPublic', function (Request $request, Response $response) {

});

$app->get('/getOne/{id}', function (Request $request, Response $response, array $args) {

});

$app->post('/insert/{id}', function (Request $request, Response $response, array $args) {

});

$app->delete('remove/{id}', function (Request $request, Response $response, array $args) {

});

$app->get('getAllWithTag/{tag}', function (Request $request, Response $response, array $args) {

});

$app->put('addTagOnNote/{id}/{tag}', function (Request $request, Response $response, array $args) {

});

$app->delete('deleteTagOnNote/{id}', function (Request $request, Response $response, array $args) {

});

$app->put('/updateNote/{id}[/{params:.*}]', function (Request $request, Response $response, array $args) {

});

$app->put('/flipPrivate/{id}', function (Request $request, Response $response, array $args) {

});