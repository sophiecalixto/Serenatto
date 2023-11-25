<?php

namespace SophieCalixto\Serenatto\Repository;

use PDO;
use SophieCalixto\Serenatto\Model\Product;

class ProductsRepository
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getProduct(string $productType) : array
    {
        $sql = $this->pdo->query("SELECT * FROM products WHERE type = '$productType' ");
        $productList = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function($product) {
            return new Product($product['id'], $product['type'], $product['image'], $product['name'], $product['description'], $product['price']);
        }, $productList);
    }

    public function getAllProducts() : array
    {
        $sql = $this->pdo->query("SELECT * FROM products ORDER BY id");
        $productsList = $sql->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function($products) {
            return new Product($products['id'], $products['type'], $products['image'], $products['name'], $products['description'], $products['price']);
        }, $productsList);
    }

    public function deleteProduct(int $id) : bool
    {
        $statement = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        if($statement->execute([$id])) {
            return true;
        }

        return false;
    }

    public function createProduct(Product $product) : bool
    {
        $statement = $this->pdo->prepare("INSERT INTO products (type, name, image, description, price) VALUES (:type, :name, :image, :description, :price)");
        if($statement->execute([
            "type" => $product->getType(),
            "name" => $product->getName(),
            "image" => $product->getImage(),
            "description" => $product->getDescription(),
            "price" => $product->getPrice()
        ]))
        {
            return true;
        };

        return false;
    }

}