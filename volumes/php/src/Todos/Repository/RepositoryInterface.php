<?php

namespace App\Todos\Repository;

interface RepositoryInterface
{
    /**
     * @return string
     */
    public function fetchTodos(): string;
}
