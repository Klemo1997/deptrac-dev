<?php

use App\Todos\UseCase\FetchTodosUseCase;

require __DIR__ . '/vendor/autoload.php';

$use_case = new FetchTodosUseCase();

$todos = $use_case->fetch();

echo $todos[0]->getId();
