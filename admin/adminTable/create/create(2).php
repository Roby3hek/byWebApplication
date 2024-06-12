<?php
if (isset($_POST["KindOfActivity"]) && isset($_POST["FIO"]) && isset($_POST["login"]) && isset($_POST["pass"])) {
      
    $conn = mysqli_connect("localhost", "a0823172_eqservise23", "1111", "a0823172_eqservise23");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $KindOfActivity = mysqli_real_escape_string($conn, $_POST["KindOfActivity"]);
    $FIO = mysqli_real_escape_string($conn, $_POST["FIO"]);
    $login = mysqli_real_escape_string($conn, $_POST["login"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
    $sql = "INSERT INTO job (KindOfActivity, FIO, login, pass) VALUES ('$KindOfActivity', '$FIO', '$login', $pass)";
        if(mysqli_query($conn, $sql)){
        header("Location: http://a0823172.xsph.ru/admin/adminTable/adminMeneger(2).php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>