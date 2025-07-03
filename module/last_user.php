<?php 
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
$user_email = 0;
$user_id = 0;
$user_rights = 0;
$user_employees = 0;
$user_id_roles = 0;

// проверка прав пользователя

// если нет в сессии user_id отправляем пользователя на авторизаацию
if (!empty($_SESSION['user_id_session'])) {
    $user_id = $_SESSION['user_id_session'];
    $_SESSION['last_url'] = $_SERVER['REQUEST_URI'];
} else{
    // Тут записываем в ссесию ссылку на которой находимся
    $_SESSION['last_url'] = $_SERVER['REQUEST_URI'];
    header("Location: /page/authorization");
    exit();
}
?>