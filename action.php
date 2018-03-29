<?php
$name = $_POST['name']; // собираем введенные данные и записываемв переменные
$email = $_POST['email'];
$pass = $_POST['pass'];
$text .= "Имя: $name \n";
$text .= "Почта: $email \n";
$text .= "Пароль: $pass \n";
$text .= "\n";
if (!empty($name) && !empty($email) && !empty($pass)) //если все переменные имеют значения выполняем запись в файл
{
    $file = fopen ("message.txt", "a+"); //открываем для перезаписи файл message.txt лежаший в одной папке с текущей страницей
    fwrite ($file,$text); // пишем в файл
    fclose ($file); // закрываем файл
}
header("Location: login.php")
?>

<!--//if ($_POST['']);-->
<!--//$file=fopen('mes.txt','a+');-->
<!--//fputs($file,$_POST['name']);-->
<!--//fputs($file,$_POST['email']);-->
<!--//fputs($file,$_POST['mes']);-->
<!--//fclose($file);-->
<!--//header("Location:index.php");-->
<!--//echo 'Данные записаны в файл!'; //можно удалить-->
<!--//?>-->

