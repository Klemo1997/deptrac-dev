<?php

use App\Http\HttpImpl;
use App\Todos\Factory\FetchTodoUseCaseFactory;

require __DIR__ . '/vendor/autoload.php';

$httpClient = new HttpImpl();
$todos = (new FetchTodoUseCaseFactory)->getInstance($httpClient)->fetch();

echo $todos[0]->getId();
