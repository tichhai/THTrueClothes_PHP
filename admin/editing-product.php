<?php
include_once "../db/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $title = $_POST["name"];
    $category_id = $_POST["category_id"];
    $brand_id = $_POST["brand_id"];
    $short_description = $_POST["short_description"];
    $description = $_POST["description"];
    $price = $_POST["regular_price"];
    $sale_price = $_POST["sale_price"];
    $sku = $_POST["SKU"];
    $qty = $_POST["quantity"];
    $stock = $_POST["stock_status"] == "0" ? 0 : 1;
    $featured = $_POST["featured"] == "0" ? 0 : 1;

    $ten = "";
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $err = "";
        $type = ["image/jpeg", "image/png"];
        if (!in_array($_FILES["image"]["type"], $type)) {
            $err .= "Loại file không được phép!";
        }
        if ($err != "") {
            echo "<script>alert('Err:$err');";
            echo 'window.history.go(-1);';
            echo '</script>';
            exit;
        }
        $ten = "./images/" . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $ten);
    }

    $uploadedImages = [];
    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['images']['error'][$key] == 0) {
                $fileType = $_FILES['images']['type'][$key];
                if (in_array($fileType, ["image/jpeg", "image/png"])) {
                    $fileName = "./images/" . $_FILES['images']['name'][$key];
                    if (move_uploaded_file($tmp_name, $fileName)) {
                        $uploadedImages[] = $fileName;
                    }
                }
            }
        }
    }

    try {
        $sql = "UPDATE product 
                SET title = :title, category = :category, brand = :brand, 
                    price = :price, sale_price = :sale_price, sku = :sku, 
                    featured = :featured, stock = :stock, qty = :qty, 
                    short_description = :short_description, 
                    description = :description" .
                    ($ten ? ", image = :image" : "") . " 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':category', $category_id);
        $stmt->bindParam(':brand', $brand_id);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':sale_price', $sale_price);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':featured', $featured);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':qty', $qty);
        $stmt->bindParam(':short_description', $short_description);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id);
        if ($ten) {
            $stmt->bindParam(':image', $ten);
        }
        $stmt->execute();

        if (!empty($uploadedImages)) {
            $sqlGallery = "INSERT INTO product_images (product, image) VALUES (:product_id, :image_path)";
            $stmtGallery = $pdo->prepare($sqlGallery);
            foreach ($uploadedImages as $imagePath) {
                $stmtGallery->bindParam(':product_id', $id);
                $stmtGallery->bindParam(':image_path', $imagePath);
                $stmtGallery->execute();
            }
        }

        header("location: products.php");
        exit();
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    echo "Không có ID nào được truyền vào!";
}
?>
