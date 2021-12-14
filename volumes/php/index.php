<?php

require __DIR__ . '/vendor/autoload.php';

$headers = ['Accept' => 'application/json'];
$options = ['auth' => ['user', 'pass']];
$request = WpOrg\Requests\Requests::get('https://jsonplaceholder.typicode.com/todos/1', $headers, $options);

echo $request->body;
