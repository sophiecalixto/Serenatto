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

}