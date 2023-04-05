<?php

namespace Session;

class SquadMember
{
    public function __construct(
        public string $name,
        public string $email,
        public string $role,
    ){}
}