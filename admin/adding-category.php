<?php
    include_once "../db/db.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            $err = "";
            $type = ["image/jpeg", "image/png"];
            if(!in_array($_FILES["image"]["type"],$type)){
                $err .= "Loại file không được phép!";
            }
            if($err != ""){
                echo "<script>alert('Err:$err');";
                echo 'window.history.go(-1);';
                echo '<script>';exit;
            }
            $ten = "./images/".$_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"],$ten);
        }
        else
            $ten = "";
        $title = $_POST["name"];
        try {
            $sql = "INSERT INTO category (title, image) VALUES (:title, :image)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':image', $ten);
            $stmt->execute();
            header("location:categories.php");
            exit();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
?>