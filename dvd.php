<?php
require_once('connect.php');
class Dvd extends Product
{
    private $size;

    public function __construct($sku, $name, $price, $size)
    {
        parent::__construct($sku, $name, $price, 'dvd');
        $this->size = $size;
    }

    public function getUniqueAttribute()
    {
        return $this->size;
    }
    public function insertDvdSpecificData($conn, $productId)
    {
        $stmt = $conn->prepare("INSERT INTO dvd (id, size) VALUES (?, ?)");
        $stmt->bind_param("is", $productId, $this->size);

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
    }
}
