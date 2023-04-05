<?php

class Employee {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function name() {
        return $this->name;
    }
}
class Department {
    private string $name;
    private array $employees = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function employees(): array {
        return $this->employees;
    }

    public function getName(): string {
        return $this->name;
    }
}

$lucas = new Employee('Lucas');
$hammed = new Employee('hammed');
//echo $employee->name();


$dep = new Department('IT');
$dep->addEmployee($lucas);
$dep->addEmployee($hammed);

echo $dep->getName() . PHP_EOL;
//var_dump($dep->employees());

foreach ($dep->employees() as $employee) {
    echo $employee->name() . PHP_EOL;
}
