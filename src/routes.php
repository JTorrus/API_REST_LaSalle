<?php

use app\src\Action\NotesAction;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', NotesAction::class . ':getMainPage');

$app->get('/getAll', NotesAction::class . ':getAll');

$app->get('/getPublic', NotesAction::class . ':getPublic');

$app->get('/getOne', NotesAction::class . ':getOne');

$app->post('/insert/{id}', function (Request $request, Response $response, array $args) {

});

$app->delete('/remove', NotesAction::class . ':remove');

$app->get('/getAllWithTag', NotesAction::class . ':addTagOnNote');

$app->put('/addTagOnNote', NotesAction::class . ':addTagOnNote');

$app->delete('deleteTagOnNote/{id}', function (Request $request, Response $response, array $args) {

});

$app->put('/updateNote/{id}[/{params:.*}]', function (Request $request, Response $response, array $args) {

});

$app->put('/flipPrivate/{id}', function (Request $request, Response $response, array $args) {

});