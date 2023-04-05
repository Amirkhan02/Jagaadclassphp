<?php

namespace OopTodoList\Controller;

use OopTodoList\Model\TaskRepository;

class HomeController implements Controller
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function canHandle(string $action): bool
    {
        return $action =='home' || $action == '';
    }

    public function handle(array $inputs = []): array
    {
        $template = require __DIR__ . '/../View/home.php';

        $tasks = $this->repository->findAll();

        return ['html' => $template($tasks)];
    }
}