<?php
session_start();
include "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password === $user['password'] || password_verify($password, $user['password'])) {
            
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['role_id']   = (int)$user['role_id'];
            $_SESSION['user_name'] = $user['first_name'];

            if ((int)$user['role_id'] === 1) {
                $_SESSION['user_role'] = 'admin';
                $response_role = "admin";
            } else {
                $_SESSION['user_role'] = 'user';
                $response_role = "user";
            }

            // Permissions
            $_SESSION['permissions'] = array();
            $perm_stmt = $conn->prepare("
                SELECT p.permission_name 
                FROM permissions p 
                JOIN role_permissions rp ON p.id = rp.permission_id 
                WHERE rp.role_id = ?
            ");
            $perm_stmt->bind_param("i", $user['role_id']);
            $perm_stmt->execute();
            $perm_result = $perm_stmt->get_result();

            while ($row = $perm_result->fetch_assoc()) {
                $_SESSION['permissions'][] = $row['permission_name'];
            }

            // Clean output buffer & send response
            ob_clean();
            echo trim($response_role);
            exit();

        } else {
            echo "invalid_password";
            exit();
        }
    } else {
        echo "user_not_found";
        exit();
    }
}
?>