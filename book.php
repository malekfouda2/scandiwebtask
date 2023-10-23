<?php
class Book extends Product
{

    private $weight;

    public function __construct($sku, $name, $price, $weight)
    {
        parent::__construct($sku, $name, $price, 'book');
        $this->weight = $weight;
    }

    public function getUniqueAttribute()
    {
        return $this->weight;
    }

    public function insertBookSpecificData($conn, $productId)
    {
        $stmt = $conn->prepare("INSERT INTO book (id, weight) VALUES (?, ?)");
        $stmt->bind_param("is", $productId, $this->weight);

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
    }
}
