<?php

namespace ManageBills\Repository;
use ManageBills\Entity\Bill;
use PDO;

class BillRepositoryFromPdo implements BillRepository
{
    public function __construct(private \PDO $pdo)
    {}


    public function store(Bill $bill): void
    {
        $sql = $this->getStoreQuery($bill);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':name' => $bill->name(),
            ':description' => $bill->description(),
            ':amount' => $bill->amount(),
            ':category' => $bill->category(),
            ':due_date' => $bill->dueDate(),
            ':paid' => (int)$bill->isPaid(),
            ':paid_date' => $bill->PaidDate()?->format('y-m-d-H:i:s'),
        ];
        if ($bill->id()) {
            $params[':id'] = $bill->id();
        }
        $stm->execute($params);
        }

    private function getStoreQuery(Bill $bill)
    {
       if ($bill->id()) {
           return <<<SQL
                 UPDATE bills
                 SET name=:name,
                     decription=:descriptio,
                     amount=:amount,
                     category=:category,
                     due_date=:due_date,
                     paid=:paid,
                     paid_date=:paid_date
                 WHERE id=:id
SQL;
       }
        return <<<SQL
            INSERT INTO bills (name, description, amount, category, due_date, paid, paid_date)
            VALUES (:name, :description, :amount, :category, :due_date, :paid, :paid_date)
SQL;
    }

    /** @return Bill[] */
    public function findAll(): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, name, description, amount, category, due_date AS dueDate, paid
            FROM bills
        SQL);
        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Bill::class);
        $stm->execute();

        return $stm->fetchAll();
    }
    public function find(int $id): Bill
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, name, description, amount, category, due_date AS dueDate, paid,paid_date AS paidDate
            FROM bills
            WHERE id=:id
        SQL);
        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Bill::class);
        $stm->bindParam(':id', $id);
        $stm->execute();

        return $stm->fetch();

    }
}