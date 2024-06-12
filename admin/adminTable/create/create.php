<?php
if (isset($_POST["surname"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
      
    $conn = mysqli_connect("localhost", "a0823172_eqservise23", "1111", "a0823172_eqservise23");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $surname = mysqli_real_escape_string($conn, $_POST["surname"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $sql = "INSERT INTO klients (surname, name, email, password) VALUES ('$surname', '$name', '$email', $password)";
        if(mysqli_query($conn, $sql)){
        header("Location: http://a0823172.xsph.ru/admin/adminTable/adminMeneger.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>