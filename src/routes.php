<?php

use app\src\Action\NotesAction;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', NotesAction::class . ':getMainPage');

$app->get('/getAll', NotesAction::class . ':getAll');

$app->get('/getAllPublic', NotesAction::class . ':getAllPublic');

$app->get('/getPublic', function (Request $request, Response $response) {

});

$app->get('/getOne', NotesAction::class . ':getOne');

$app->post('/insert/{id}', function (Request $request, Response $response, array $args) {

});

$app->delete('/remove', NotesAction::class . ':removeOne');

$app->get('/getAllWithTag', NotesAction::class . ':addTagOnNote');

$app->put('/addTagOnNote', NotesAction::class . ':addTagOnNote');

$app->delete('deleteTagOnNote/{id}', function (Request $request, Response $response, array $args) {

});

$app->put('/updateNote/{id}[/{params:.*}]', function (Request $request, Response $response, array $args) {

});

$app->put('/flipPrivate/{id}', function (Request $request, Response $response, array $args) {

});