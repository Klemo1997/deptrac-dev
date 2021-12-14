<?php

namespace App\Todos\UseCase;

use App\Todos\Data\Todo;
use App\Todos\Serializer\FetchTodosResponseSerializer;
use WpOrg\Requests\Requests;

final class FetchTodosUseCase
{
    public function __construct() {}

    /**
     * @return Todo[]
     */
    public function fetch(): array
    {
        $headers = ['Accept' => 'application/json'];
        $request = Requests::get('https://jsonplaceholder.typicode.com/todos', $headers);

        return (new FetchTodosResponseSerializer())->deserialize($request->body);
    }
}
