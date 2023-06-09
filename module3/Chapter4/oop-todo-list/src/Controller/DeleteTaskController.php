<?php

namespace OopTodoList\Controller;

use OopTodoList\Model\TaskRepository;

class DeleteTaskController implements Controller
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function canHandle(string $action): bool
    {
        return $action === 'delete-task';
    }

    public function handle(array $inputs = []): array
    {
        $id = $inputs['id'] ?? '';
        $this->repository->delete($id);
        return ['id' => $id];
    }
}
