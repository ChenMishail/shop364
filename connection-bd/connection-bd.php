<?php
// Параметры подключения (соответствуют вашему скриншоту)
$host = "localhost";      // Хост
$user = "site";          // Имя пользователя
$password = "p@ssword";  // Пароль (без звездочки, если она не входит в пароль)
$database = "site";      // База данных

// Создаем подключение
$conn_main = new mysqli($host, $user, $password, $database);

// Проверяем подключение
if ($conn_main->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn_main->connect_error);
}

// Устанавливаем кодировку UTF-8
$conn_main->set_charset("utf8");
?>