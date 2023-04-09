<?php

class Form {
    private $action;
    private $method;
    private $inputs;

    public function __construct($action, $method, $inputs)
    {
        $this->action = $action;
        $this->method = $method;
        $this->inputs = $inputs;
    }

    public function render()
    {
        $form = '<form action="' . $this->action . '" method="' . $this->method . '">';
        foreach ($this->inputs as $input) {
            $form .= $input->render();
        }
        $form .= '</form>';
        return $form;
    }
}

class Input {
    private $type;
    private $name;
    private $value;

    public function __construct($type, $name, $value)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
    }

    public function render()
    {
        return '<input type="' . $this->type . '" name="' . $this->name . '" value="' . $this->value . '">';
    }
}

$inputs = [
    new Input('text', 'name', 'Hammed Kan'),
    new Input('email', 'email', 'khanshittu@gmail.com'),
    new Input('password', 'password', '123456')
];

$form = new Form('/submit', 'POST', $inputs);
echo $form->render();