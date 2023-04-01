<?php
/*
interface Animal {
    public function makesound();
}

class cat implements Animal {
    public function makesound(){
        echo "meow";
    }
}

class dog implements Animal {
    public function makesound(){
        echo "bark";
    }
}

class cow implements Animal {
    public function makesound(){
        echo "mohh";
    }
}
*/

interface Output{
    public function print($message);

    public function printList(array $message);
}

interface CalculatorInput{
    public function getInput($message = null): float;
}

class CliInput implements CalculatorInput{
    public function getInput($message = null): float {
        return  (float)readline($message);
      
    }

}


class cliOutput implements Output {
    public function print($message){
        echo $message . PHP_EOL;
    }

public function printList(array $message) {
    echo PHP_EOL . '--------------' . PHP_EOL;
    echo implode(PHP_EOL, $message);
    echo PHP_EOL . '--------------' . PHP_EOL;
}
}

class HtmlOutput implements Output {
    public function print($message){
        echo "$message<br>";
    }

public function printList(array $message) {
    echo '<br>--------------<br>';
    echo implode('<br>', $message);
    echo '<br> -------------- <br>';
}
}

class Calculator {

    private CalculatorInput $input;

    private Output $output;

    private array $history;

    public function __construct(CalculatorInput $input, Output $output) {
        $this->input = $input;
        $this->output = $output;
    }
/*
    public function sum($num1, $num2) {
        $sum = $num1 + $num2;
        $this->output->print("The $num1 + $num2 result is $sum");
        $this->history[] = $num1 + $num2 = $sum;
    }
*/

public function sum() {
    $num1 = $this->input->getInput('Input1:');
    $num2 = $this->input->getInput('Input2:');

    $sum = $num1 + $num2;
    $this->output->print("The $num1 + $num2 result is $sum");
    $this->history[] = $num1 + $num2 = $sum;
}
    public function showHistory(){
        $this->output->printList($this->history);
    }
}

$calc = new Calculator(new CliInput, new CliOutput);
$calc->sum();
$calc->sum();
$calc->sum();

$calc->showHistory();



