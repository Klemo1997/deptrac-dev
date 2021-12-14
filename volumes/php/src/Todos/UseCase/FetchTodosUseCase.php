<?php

namespace App\Todos\UseCase;

use App\Todos\Data\Todo;
use App\Todos\Repository\RepositoryInterface;
use App\Todos\Serializer\FetchTodosResponseSerializer;

final class FetchTodosUseCase
{
    public function __construct(
        private RepositoryInterface $repository
    ) {}

    /**
     * @return Todo[]
     */
    public function fetch(): array
    {
        $response = $this->repository->fetchTodos();

        return (new FetchTodosResponseSerializer())->deserialize($response);
    }
}
