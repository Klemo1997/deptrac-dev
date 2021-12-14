<?php

namespace App\Todos\Serializer;

use App\Todos\Data\Todo;
use JetBrains\PhpStorm\Pure;

final class FetchTodosResponseSerializer
{
    public function denormalize(string $response): array
    {
        return json_decode($response, JSON_THROW_ON_ERROR);
    }

    public function deserialize(string $response): array
    {
        $denormalized_todos = $this->denormalize($response);

        return array_map(fn ($todo) => $this->deserializeItem($todo), $denormalized_todos);
    }

    #[Pure] private function deserializeItem(array $todo): Todo
    {
        return new Todo(
            $todo['userId'],
            $todo['id'],
            $todo['title'],
            $todo['completed'],
        );
    }
}

