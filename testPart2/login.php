<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $stmt->store_result();
    $stmt->bind_result($user_id, $first_name, $last_name, $email, $phone, $hashed_password);

    if ($stmt->fetch()) {
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $stmt->close();
            $conn->close();

            header("Location: index.php");
            exit();
        } else {
            $stmt->close();
            $conn->close();
            echo "Invalid email or password";
        }
    } else {
        $stmt->close();
        $conn->close();
        echo "Invalid email or password";
    }
}
?>
