<?php

class Account {
    private string $id;
    private string $name;
    private float $balance;

    public function __construct(string $id, string $name, float $balance)
    {
        $this->id = $id;
        $this->name = $name;
        $this->balance = $balance;
    }
    public function summary(): string{
        return $this->id . '' . $this->name . ' $' . $this->balance;
    }
    public function credit(float $amount): void
    {
        $this->balance += $amount;
    }
    public function debit(float $amount): void
    {
        $this->balance -= $amount;
    }
    public function transferTo(Account $anotherAccount, float $amount): void
    {
        $this->debit($amount);
        $anotherAccount->credit($amount);
    }
}

$a = new Account('#1', 'AccountA', 100);
$b = new Account('#2', 'AccountB', 10);

$b->credit(10);

$a->transferTo($b, 50);

echo $b->summary();
echo PHP_EOL;
echo $a->summary();