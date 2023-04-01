<?php

namespace classes;

class Form
{
    /** @var InputText[] */
    private array $input;
    private string $submitLabel;
    private string $name;
    private string $method;
    private string $action;

    /**
     * @return array
     */
    public function __construct(string $name, string $method, string $action)
    {
        $this->input = $name;
        $this->method = $method;
        $this->action = $action;
    }
    public function addInput(InputText $inputText): void
    {
        $this->input[] = $inputText;
    }

    public function setSubmitButtonLabel(string $value): void
    {
        $this->submitLabel = $value;
    }

    public function  render(): string
    {
        $input = '';
        foreach ($this->inputs as $input) {
            $inputsHtml .= $input->render();
        }
        return <<<HTML 
                     <form name="$this->name" method="$this->method" action="$this->action">
                        $inputsHtml
                        <input type="submit"> value="$this->submitLabel">
                     </form>
           HTML;
    }
}