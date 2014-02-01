<?php

require __DIR__ . '/../bootstrap.php';

$basepath = __DIR__ .'/../';

use Symfony\Component\Console\Application;

$application = new Application();
$command = new \Command\Module\StatusCommand();
$command->setBasePath($basepath);
$application->add($command);
$application->run();
