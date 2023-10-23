<?php
abstract class Product
{
    public $sku;
    public $name;
    public $price;
    public $type;

    function __construct($sku, $name, $price, $type)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }


    abstract public function getUniqueAttribute();

    public function insertProduct($conn)
    {
        $sku_check_stmt = $conn->prepare("SELECT id FROM products WHERE sku = ?");
        $sku_check_stmt->bind_param("s", $this->sku);
        $sku_check_stmt->execute();
        $sku_check_result = $sku_check_stmt->get_result();

        if ($sku_check_result->num_rows > 0) {
            $error_message = "SKU already exists. Please use a unique SKU.";

            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '$error_message',
            });
          </script>";
            return;
        }

        $stmt = $conn->prepare("INSERT INTO products (sku, name, price, type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->sku, $this->name, $this->price, $this->type);

        if ($stmt->execute()) {
            return $conn->insert_id;
        } else {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
    }
}
