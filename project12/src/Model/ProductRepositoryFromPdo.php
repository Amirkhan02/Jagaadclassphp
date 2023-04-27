<?php

namespace OnlineShopping3\Model;

class ProductRepositoryFromPdo implements ProductRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->prepare(<<<SQL
            SELECT * FROM products
        SQL);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Product::class);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function addProduct(Product $product): void
    {
        $stmt = $this->pdo->prepare(<<<SQL
            INSERT INTO products
            (name, description, price, quantity)
            VALUES
            (:name, :description, :price, :quantity)
        SQL);

        $stmt->execute([
            ':name' => $product->name(),
            ':description' => $product->description(),
            ':price' => $product->price(),
            ':quantity' => $product->quantity(),
        ]);
    }
    public function removeProduct(string $id): void
    {
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $stmt = $this->pdo->prepare(<<<SQL
            DELETE FROM products WHERE id = ?
        SQL);

        $stmt->execute([$id]);
    }
}