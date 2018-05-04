<?php

$base = __DIR__ . '/../app/';

$folders = [
    'src/Entity/',
    'src/Action/'
];

foreach ($folders as $f) {
    foreach (glob($base . "$f/*.php") as $filename) {
        require $filename;
    }
}