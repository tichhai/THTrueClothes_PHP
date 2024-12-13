<?php 
    include_once "../db/db.php";
    session_start();
    $_SESSION["changed_password"] = "";
    $_SESSION["error_setting"] = "";

    try {
        $sql = "SELECT * FROM user WHERE id=4";
        $stmt = $pdo->query($sql);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          echo "Lỗi: " . $e->getMessage();
      }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $phone = $_POST["mobile"];
        $old_password = $_POST["old_password"];
        $new_password = $_POST["new_password"];
        $new_password_confirmation = $_POST["new_password_confirmation"];
        if($old_password != ""){
            if(!password_verify($old_password, $admin['password'])){
                $_SESSION["error_setting"] = "Password incorrect!";
                $_SESSION["changed_password"] = "";
                header("location: settings.php");
                exit();
            }
            if($new_password != "" && $new_password_confirmation != $new_password){
                $_SESSION["error_setting"] = "Password not match!";
                $_SESSION["changed_password"] = "";
                header("location: settings.php");
                exit();
            }
            try {
                $hashedPassword = password_hash($new_password,PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password = :password WHERE id=4";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();
                $_SESSION["error_setting"] = "";
                $_SESSION["changed_password"] = "Password Changed Successfully!";
            } catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
        
        try {
            $sql = "UPDATE setting SET name = :name, phone = :phone";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();
            $_SESSION["error_setting"] = "";
            header("location: settings.php");
            exit();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
?>