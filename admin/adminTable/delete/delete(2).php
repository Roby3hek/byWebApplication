<?php
if(isset($_POST["IDKind"]))
{
    $conn = mysqli_connect("localhost", "a0823172_eqservise23", "1111", "a0823172_eqservise23");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $userid = mysqli_real_escape_string($conn, $_POST["IDKind"]);
    $sql = "DELETE FROM job WHERE IDKind = '$userid'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: http://a0823172.xsph.ru/admin/adminTable/adminMeneger(2).php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>