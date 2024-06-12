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
    $sql = "SELECT * FROM sales WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $title_id = $row["title_id"];
                $fio = $row["fio"];
                $adress = $row["adress"];
                $number = $row["number"];
                $oplata = $row["oplata"];
                $status = $row["status"];
            }
            echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>id услуги:
                    <input type='number' name='title_id' value='$title_id' /></p>
                    <p>ФИО:
                    <input type='text' name='fio' value='$fio' /></p>
                    <p>Адрес:
                    <input type='text' name='adress' value='$adress' /></p>
                    <p>Номер телефона:
                    <input type='number' name='number' value='$number' /></p>
                    <p>Оплата:
                    <select type='text' name='oplata' value='$oplata'>
                    <option></option>
                    <option>Наличными</option>
                    <option>Онлайн</option>
                    </select></p>
                    <p>Статус:
                    <select type='text' name='status' value='$status'>
                    <option></option>
                    <option>New</option>
                    <option>Transfer</option>
                    <option>Close</option>
                    <option>Canceled</option>
                    </select></p>
                    <br><input type='submit' value='Сохранить'>
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
elseif (isset($_POST["id"]) && isset($_POST["title_id"]) && isset($_POST["fio"]) && isset($_POST["adress"]) && isset($_POST["number"])&& isset($_POST["oplata"])&& isset($_POST["status"])) {
      
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);
    $title_id = mysqli_real_escape_string($conn, $_POST["title_id"]);
    $fio = mysqli_real_escape_string($conn, $_POST["fio"]);
    $adress = mysqli_real_escape_string($conn, $_POST["adress"]);
    $number = mysqli_real_escape_string($conn, $_POST["number"]);
    $oplata = mysqli_real_escape_string($conn, $_POST["oplata"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
      
    $sql = "UPDATE sales SET title_id = '$title_id', fio = '$fio', adress = '$adress', number = '$number', oplata = '$oplata', status = '$status'  WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: http://a0823172.xsph.ru/admin/adminTable/adminMeneger(3).php");
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