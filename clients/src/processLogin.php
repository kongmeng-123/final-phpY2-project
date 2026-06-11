<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_data'])) {
    $user = json_decode($_POST['user_data'], true);
    
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_fname'] = explode(' ', $user['fullname'])[0];
        $_SESSION['user_lname'] = explode(' ', $user['fullname'], 2)[1] ?? '';
        $_SESSION['user_email'] = $user['email'];
        
        header("Location: index.php");
        exit();
    }
}


header("Location: login.php");
exit();
?>