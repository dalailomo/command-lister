<?php

require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->get('/', function() use($app) {
    $all = [];

    $execWrap = "compgen -%s";

    exec(sprintf($execWrap, 'c'), $all['commands']);
    exec(sprintf($execWrap, 'a'), $all['aliases']);
    exec(sprintf($execWrap, 'b'), $all['builtins']);
    exec(sprintf($execWrap, 'k'), $all['keywords']);
    exec(sprintf($execWrap, 'A function'), $all['functions']);

    return $app->json($all);
});

$app->get('/man/{command}/', function($command) use($app) {
    $all['command'] = $command;
    $manOutput = [];

    exec('man ' . $command . ' | col -bx', $manOutput);
    $all['desc'] = implode(PHP_EOL, $manOutput);

    return $app->json($all);
});

$app->run();
