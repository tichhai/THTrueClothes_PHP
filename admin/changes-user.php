<?php
    include_once "../db/db.php";
    if (isset($_GET['id']) && isset($_GET['status'])) {
        $id = $_GET['id']; 
        $status = $_GET['status']; 
        $statusChange = $status == "1" ? 0 : 1;
        try {
            $sql = "UPDATE user SET status = :status WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $statusChange);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            header("location: users.php");
            exit();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        echo "Không có ID nào được truyền vào!";
    }
?>
