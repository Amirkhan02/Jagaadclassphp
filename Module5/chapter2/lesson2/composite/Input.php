<?php

class Input Implements Renderable
{
    public function render(): string
    {
        return '<input type="text" />';
    }


}