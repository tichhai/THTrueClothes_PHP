<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        try {
            include_once "../db/db.php";
            $checkSql = "SELECT COUNT(*) FROM product WHERE category = :id";
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->bindParam(':id', $id);
            $checkStmt->execute();
            $productCount = $checkStmt->fetchColumn();
            if ($productCount > 0) {
                echo "<script>alert('Không thể xóa danh mục này vì có sản phẩm liên kết với nó.')</script>";
                echo "<script>window.location.href = 'categories.php';</script>";
                exit(); 
            } else {
                $sql = "DELETE FROM category WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                header("location:categories.php");
                exit();
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        echo "Không có ID nào được truyền vào!";
    }
?>
