<?php

namespace SophieCalixto\Serenatto\Model;

class Product
{
    private int $id;
    private string $type;
    private string $image;
    private string $name;
    private string $description;
    private string $price;

    /**
     * @param int $id
     * @param string $type
     * @param string $image
     * @param string $name
     * @param string $description
     * @param string $price
     */
    public function __construct(int $id, string $type, string $image, string $name, string $description, string $price)
    {
        $this->id = $id;
        $this->type = $type;
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): string
    {
        return $this->price;
    }
}