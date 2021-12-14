<?php

use App\Todos\Factory\FetchTodoUseCaseFactory;

require __DIR__ . '/vendor/autoload.php';

$todos = (new FetchTodoUseCaseFactory)->getInstance()->fetch();

echo $todos[0]->getId();
