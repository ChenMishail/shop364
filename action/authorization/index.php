<?php
session_start();
if (isset($_POST['input_authorization'])){
    $form_email = test_input($_POST['form-email']);
    $form_password = test_input($_POST['form-password']);
}else {
    exit('Некорректный метод POST.');
}
echo $form_email;
echo $form_password;
//подключение базы данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/connection-bd/connection-bd.php';
mysqli_set_charset($conn_main, "utf8");

$sql = "SELECT * FROM authorization WHERE email = '$form_email'";
if($result = mysqli_query($conn_main, $sql)){
    $row = $result->fetch_assoc();

    $user_email = $row["email"];
    $user_password = $row["password"];
    $user_name = $row["name"];
    $user_id = $row["id"];
}else{
    exit ("Неверный Email");
}

// Сравниваем пароль введеный пользователем и пароль в базе данных
if ($user_password === $form_password) {
    // Записываем в сессию id пользователя
    $_SESSION['user_id_session'] = $user_id;
    header("Location: /index.php"); //перенос на главную странницу
    exit();
}else{
    exit ("Неверный Пароль");
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>