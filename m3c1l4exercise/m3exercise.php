<?php
class  Average {
    private float $average;

    public function calculate(float $num1, float $num2, float $num3): void {
        $average = ($num1 + $num2 + $num3) / 3;
        echo $average . PHP_EOL;
    }
}

Average::calculate();
