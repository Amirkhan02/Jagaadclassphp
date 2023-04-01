<?php

namespace Session;

class Squad
{
    public function __construct(
        public array $members = [],
    ){}

    public function add(SquadMember $member): void
    {
        $this->members[] = $member;
    }

    public function remove(string $email): void
    {
        foreach ($this->members as $key => $member) {
            if ($member->email === $email) {
                unset($this->members[$key]);
            }
        }
    }


}