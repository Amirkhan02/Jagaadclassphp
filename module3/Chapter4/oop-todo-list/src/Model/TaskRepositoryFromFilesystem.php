<?php

namespace OopTodoList\Model;

class TaskRepositoryFromFilesystem implements TaskRepository
{
    private const STORAGE_FILE = __DIR__ . '/../../data/storage.json';


    public function store(Task $task): void
    {
        if (! file_exists(self::STORAGE_FILE)) {
            file_put_contents(self::STORAGE_FILE, json_encode([]));
        }
        $tasks = json_decode(file_get_contents(self::STORAGE_FILE));

        $tasks[] = [
            'id' => $task->id(),
            'title' => $task->title(),
            'isDone' => $task->isDone(),
        ];
        file_put_contents(self::STORAGE_FILE, json_encode($tasks));
    }
    public function delete(string $id): void
    {
        echo 'fake- deleted: ' . $id . '<br>';
        // do nothing.
    }
    public function findAll(): array
    {
        return [];
    }
}