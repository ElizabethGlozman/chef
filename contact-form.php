<?php
 
/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$message = htmlspecialchars($_POST["message"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);
 
/* Ваш адрес и тема сообщения */
$address = "elizabeth.glozman@gmail.com";
$sub = "Сообщение с сайта Chef";
 
/* Формат письма */
$mes = "Сообщение с сайта Chef.\n
Имя отправителя: $name 
Электронный адрес отправителя: $email
Текст сообщения:
$message";
 
 
if ($bezspama==6) /*Проверка на бота*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
 header('Refresh: 3; URL=schedule.html');
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body background="img/IMG_0310.jpg">
	<h1 style="color:#FFFFFF" align="center">Письмо отправлено, через 3 секунды вы вернетесь на страницу</h1>
	</body>';}
else {
 header('Refresh: 3; URL=schedule.html');
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body background="img/IMG_0310.jpg">
	<h1 style="color:#FFFFFF" align="center">Письмо не отправлено, через 3 секунды вы вернетесь на страницу</h1>
	</body>';}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */
?>