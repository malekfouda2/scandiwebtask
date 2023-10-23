<?php
class Furniture extends Product
{
    private $length;
    private $width;
    private $height;

    public function __construct($sku, $name, $price, $length, $width, $height)
    {
        parent::__construct($sku, $name, $price, 'furniture');
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getUniqueAttribute()
    {
        return [
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }

    public function insertFurnitureSpecificData($conn, $productId)
    {
        $stmt = $conn->prepare("INSERT INTO furniture (id, length, width, height) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $productId, $this->length, $this->width, $this->height);

        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
    }
}
