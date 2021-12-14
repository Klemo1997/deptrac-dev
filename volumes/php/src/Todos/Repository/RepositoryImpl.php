<?php

namespace App\Todos\Repository;

use App\Http\HttpClient;

final class RepositoryImpl implements RepositoryInterface
{
    public function __construct(private HttpClient $httpClient)
    {}

    public function fetchTodos(): string
    {
        $headers = ['Accept' => 'application/json'];

        return $this->httpClient->get('https://jsonplaceholder.typicode.com/todos', $headers);
    }
}
