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
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = mysqli_real_escape_string($conn, $_GET["id"]);
    $sql = "SELECT * FROM klients WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $surname = $row["surname"];
                $name = $row["name"];
                $email = $row["email"];
                $password = $row["password"];
            }
            echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Фамилия:
                    <input type='text' name='surname' value='$surname' /></p>
                    <p>Имя:
                    <input type='text' name='name' value='$name' /></p>
                    <p>Почта:
                    <input type='text' name='email' value='$email' /></p>
                    <p>Пароль:
                    <input type='text' name='password' value='$password' /></p>
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
elseif (isset($_POST["id"]) && isset($_POST["surname"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
      
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);
    $surname = mysqli_real_escape_string($conn, $_POST["surname"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
      
    $sql = "UPDATE klients SET surname = '$surname', name = '$name', email = '$email', password = '$password' WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: http://a0823172.xsph.ru/admin/adminTable/adminMeneger.php");
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