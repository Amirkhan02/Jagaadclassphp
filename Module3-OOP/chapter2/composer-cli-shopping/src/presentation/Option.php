<?php

namespace Jagaad\presentation;

Interface Option
{
    public  function key(): string;
    public function description(): string;
    public function handle(): void;

}