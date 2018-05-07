<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require 'vendor/autoload.php';

$settings = include 'src/settings.php';
$settings = $settings['settings']['doctrine'];

$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $settings['meta']['entity_path'],
    $settings['meta']['auto_generate_proxies'],
    $settings['meta']['proxy_dir'],
    $settings['meta']['cache'],
    false
);

try {
    $em = \Doctrine\ORM\EntityManager::create($settings['connection'], $config);
} catch (\Doctrine\ORM\ORMException $e) {
}

return ConsoleRunner::createHelperSet($em);