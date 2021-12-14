<?php

namespace App\Todos\Repository;

use WpOrg\Requests\Requests;

final class RepositoryImpl implements RepositoryInterface
{
    public function fetchTodos(): string
    {
        $headers = ['Accept' => 'application/json'];
        return Requests::get('https://jsonplaceholder.typicode.com/todos', $headers)->body;
    }
}
