<?php

namespace App\Todos\Factory;

use App\Http\HttpClient;
use App\Todos\Repository\RepositoryImpl;
use App\Todos\UseCase\FetchTodosUseCase;
use JetBrains\PhpStorm\Pure;

final class FetchTodoUseCaseFactory
{
    #[Pure] public function getInstance(HttpClient $httpClient): FetchTodosUseCase
    {
        $repository = new RepositoryImpl($httpClient);

        return new FetchTodosUseCase($repository);
    }
}
