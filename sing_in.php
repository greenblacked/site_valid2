<?php
// Имя файла данных
$filename = "text.txt";
// Определяем константу FIRST для
// того, чтобы точно определить
// был ли выполнен файл 1.php
define("FIRST",1);
// Проверяем не пусто ли содержимое
// массива $_POST - если это так,
// выводим форму для авторизации
if(empty($_POST))
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Log_in</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
<form method=post>
            <tr>
                <td>Имя:</td>
                <td><input type=text id="fname" name=name></td>
            </tr>
            <tr>
                <td>Пароль:</td>
                <td><input type=password id="pass1" name=pass></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type=submit value='Войти'></td>
            </tr>
        </form>
    </table>
    </body>
    </html>
    <table>

    <?php
}
// В противном случае, если POST-данные
// переданы - обрабатываем их
else
{
    // Проверяем корректность введённого имени
    // и пароля
    $arr = file($filename);
    $i = 0;
    $temp = array();
    foreach($arr as $line)
    {
        // Разбиваем строку по разделителю ::
        $data = explode("::",$line);
        // В массив $temp помещаем имена и пароли
        // зарегистрированных посетителей
        $temp['name'][$i]     = $data[0];
        $temp['password'][$i] = $data[1];
        $temp['email'][$i]    = $data[2];
        $temp['url'][$i]      = trim($data[3]);
        // Увеличиваем счётчик
        $i++;
    }
    // Если в массиве $temp['name'] нет введённого
    // логина - останавливаем работу скрипта
    if(!in_array($_POST['name'],$temp['name']))
    {
        exit("Пользователь с таким именем не зарегистрирован");
    }
    // Если пользователь с именем $_POST['name'] обнаружен
    // проверяем правильность введённого пароля
    $index = array_search($_POST['name'],$temp['name']);
    if($_POST['pass'] != $temp['password'][$index])
    {
        exit("Пароль не соответствует логину");
    }
    // Если переданный пароль соответсвует паролю из
    // файла text.txt выводим форму для редактирования
    // данных

     include "sing_in2.php"
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/index_style.css">
</head>
<body>
<input class="change_info" type="button" value="Change" onclick="location.href = 'login_1.php'">
    </body>
</html>
    <?php
}
?>