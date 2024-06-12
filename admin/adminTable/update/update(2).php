<?php
$conn = mysqli_connect("localhost", "a0823172_eqservise23", "1111", "a0823172_eqservise23");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["IDKind"]))
{
    $IDKind = mysqli_real_escape_string($conn, $_GET["IDKind"]);
    $sql = "SELECT * FROM job WHERE IDKind = '$IDKind'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $KindOfActivity = $row["KindOfActivity"];
                $FIO = $row["FIO"];
                $login = $row["login"];
                $pass = $row["pass"];
            }
            echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='IDKind' value='$IDKind' />
                    <p>Фамилия:
                    <input type='text' name='KindOfActivity' value='$KindOfActivity' /></p>
                    <p>Имя:
                    <input type='text' name='FIO' value='$FIO' /></p>
                    <p>Логин:
                    <input type='text' name='login' value='$login' /></p>
                    <p>Пароль:
                    <input type='text' name='pass' value='$pass' /></p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["IDKind"]) && isset($_POST["KindOfActivity"]) && isset($_POST["FIO"]) && isset($_POST["login"]) && isset($_POST["pass"])) {
      
    $IDKind = mysqli_real_escape_string($conn, $_POST["IDKind"]);
    $KindOfActivity = mysqli_real_escape_string($conn, $_POST["KindOfActivity"]);
    $FIO = mysqli_real_escape_string($conn, $_POST["FIO"]);
    $login = mysqli_real_escape_string($conn, $_POST["login"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
      
    $sql = "UPDATE job SET KindOfActivity = '$KindOfActivity', FIO = '$FIO', login = '$login', pass = '$pass' WHERE IDKind = '$IDKind'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: http://a0823172.xsph.ru/admin/adminTable/adminMeneger(2).php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
else{
    echo "Некорректные данные";
}
mysqli_close($conn);
?>
</body>
</html>