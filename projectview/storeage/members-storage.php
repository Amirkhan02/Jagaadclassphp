<?php

use Session\SquadMember;

function findSquadMember(string $email): ?SquadMember {
    foreach (allSquadMembers() as $item) {
        if ($item->email === $email) {
            return $item;
        }
    }
    return null;
}

function allSquadMembers(): array {
    return [
        new SquadMember('Marcos', 'marcos@test.dev', 'PHP Developer'),
        new SquadMember('Ronaldinho', 'r10@test.dev', 'Product Owner'),
        new SquadMember('Zidane', 'zidane@test.dev', 'Java Developer'),
        new SquadMember('Cafú', 'cafu@test.dev', 'Scrum Master'),
        new SquadMember('Roberto Carlos', 'rcarlos@test.dev', 'PHP Developer'),
        new SquadMember('Rivaldo', 'rivaldo@test.dev', 'PHP Developer'),
        new SquadMember('Adriano', 'adriano@test.dev', 'PHP Developer'),
        new SquadMember('Pelé', 'pele@test.dev', 'PHP Developer'),
        new SquadMember('Messi', 'messi@test.dev', 'TypeScript Developer'),
        new SquadMember('Neymar', 'ney@test.dev', 'TypeScript Developer'),
    ];
}

