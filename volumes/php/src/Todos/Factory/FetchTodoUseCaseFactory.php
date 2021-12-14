<?php

namespace App\Todos\Factory;

use App\Todos\Repository\RepositoryImpl;
use App\Todos\UseCase\FetchTodosUseCase;
use JetBrains\PhpStorm\Pure;

final class FetchTodoUseCaseFactory
{
    #[Pure] public function getInstance(): FetchTodosUseCase
    {
        $repository = new RepositoryImpl();

        return new FetchTodosUseCase($repository);
    }
}
