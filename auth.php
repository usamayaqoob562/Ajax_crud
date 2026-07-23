<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// User Session Verification
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Helper Function for Permissions
if (!function_exists('hasPermission')) {
    function hasPermission($permission_name) {
        if (isset($_SESSION['permissions']) && is_array($_SESSION['permissions'])) {
            return in_array($permission_name, $_SESSION['permissions']);
        }
        return false;
    }
}
?>