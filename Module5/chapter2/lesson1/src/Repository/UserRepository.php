<?php

namespace OrmLesson\Repository;

use OrmLesson\Entity\User;

interface UserRepository
{
    public function store(User $user): void;
    public function find(string $userId): user;
}