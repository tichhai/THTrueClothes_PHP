<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        try {
            include_once "../db/db.php";
            $sql = "DELETE FROM slider WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            header("location:slider.php");
            exit();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        echo "Không có ID nào được truyền vào!";
    }
?>