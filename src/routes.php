<?php

use app\src\Action\NotesAction;

// Routes

$app->get('/', NotesAction::class . ':getMainPage');

$app->get('/getAll', NotesAction::class . ':getAll');

$app->get('/getPublic', NotesAction::class . ':getPublic');

$app->get('/getOne', NotesAction::class . ':getOne');

$app->post('/insert', NotesAction::class . ':insert');

$app->delete('/remove', NotesAction::class . ':remove');

$app->get('/getAllWithTag', NotesAction::class . ':getAllWithTag');

$app->put('/addTagOnNote', NotesAction::class . ':addTagOnNote');

$app->put('/deleteTagOnNote', NotesAction::class . ':removeTagOnNote');

$app->put('/updateNote', NotesAction::class . ':updateNote');

$app->put('/flipPrivate', NotesAction::class . ':flipPrivate');