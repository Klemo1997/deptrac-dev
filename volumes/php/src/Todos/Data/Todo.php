<?php

namespace App\Todos\Data;

final class Todo
{
    public function __construct(
        private int $userId,
        private int $id,
        private string $title,
        private bool $completed,
    )
    {}

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->completed;
    }
}
