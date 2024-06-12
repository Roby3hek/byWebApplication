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
    $sql = "SELECT * FROM jobtitle WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $title = $row["title"];
            }
                
            echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Фамилия:
                    <input type='text' name='title' value='$title' /></p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Услуга не найдена</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["id"]) && isset($_POST["title"])) {
      
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
      
    $sql = "UPDATE jobtitle SET title = '$title' WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: http://a0823172.xsph.ru/admin/adminTable/adminMeneger(4).php");
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