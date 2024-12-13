<?php
    include_once "../db/db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $title = $_POST["title"];
        $subtitle = $_POST["subtitle"];
        $tagline = $_POST["tagline"];
        $link = $_POST["link"];
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
        } else {
            try {
                $sql = "UPDATE slider SET title = :title,subtitle = :subtitle,tagline = :tagline,link = :link WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':subtitle', $subtitle);
                $stmt->bindParam(':tagline', $tagline);
                $stmt->bindParam(':link', $link);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                header("location: slider.php");
                exit();
            } catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
            exit();
        }
        try {
            $sql = "UPDATE slider SET title = :title,subtitle = :subtitle,tagline = :tagline,link = :link, image = :image WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':subtitle', $subtitle);
            $stmt->bindParam(':tagline', $tagline);
            $stmt->bindParam(':link', $link);
            $stmt->bindParam(':image', $ten);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            header("location: slider.php");
            exit();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        echo "Không có ID nào được truyền vào!";
    }
?>
