<?php
if(isset($_POST["id"]))
{
    $conn = mysqli_connect("localhost", "a0823172_eqservise23", "1111", "a0823172_eqservise23");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql = "DELETE FROM formS WHERE id = '$userid'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: http://a0823172.xsph.ru/admin/adminTable/adminMeneger(5).php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>