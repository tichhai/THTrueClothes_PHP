<?php
    include_once "db/db.php";
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $phone = $_POST["mobile"];
        $email = $_POST["email"];
        $retype_pass = $_POST["password_confirmation"];
        $password = $_POST["password"];
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        if($password != $retype_pass){
            $_SESSION['error'] = "Password not match!";
            header("Location: register.php");
            exit();
        }
        try {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "Email already exists!";
                header("Location: register.php");
                exit();
            }
            
            $sql = "INSERT INTO user (name,phone, email, password) VALUES (:name,:phone, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            
            if ($stmt->execute()) {
                $_SESSION['success'] = "Registration successful!";
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['error'] = "Something went wrong, please try again!";
                header("Location: register.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header("Location: register.php");
            exit();
        }
    }
?>