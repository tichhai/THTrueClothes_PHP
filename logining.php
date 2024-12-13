<?php
    session_start();
    include_once "db/db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        try {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password']) && $user["status"] == 1) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['image'] = $user['image'];
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "Invalid username or password!";
                header("Location: login.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header("Location: login.php");
            exit();
        }
    }
?>