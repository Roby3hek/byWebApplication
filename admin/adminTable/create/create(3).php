<?php
if (isset($_POST["title_id"]) && isset($_POST["fio"]) && isset($_POST["adress"]) && isset($_POST["number"])) {
      
    $conn = mysqli_connect("localhost", "a0823172_eqservise23", "1111", "a0823172_eqservise23");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $title_id = mysqli_real_escape_string($conn, $_POST["title_id"]);
    $fio = mysqli_real_escape_string($conn, $_POST["fio"]);
    $adress = mysqli_real_escape_string($conn, $_POST["adress"]);
    $number = mysqli_real_escape_string($conn, $_POST["number"]);
    $sql = "INSERT INTO sales (title_id, fio, adress, number) VALUES ('$title_id', '$fio', '$adress', $number)";
        if(mysqli_query($conn, $sql)){
        header("Location: http://a0823172.xsph.ru/admin/adminTable/adminMeneger(3).php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>