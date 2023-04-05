<?php

class Button implements Renderable
{
    public function render(): string
    {
        return '<button name="test" value="test">Submit</button>';
    }

}