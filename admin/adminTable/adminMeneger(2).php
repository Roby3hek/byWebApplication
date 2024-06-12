<!DOCTYPE html>
   <style>
   .lk{
        padding: 6px;
   }
   .font{
       background:#000000;
   }
            .regButton {
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 3px;
        padding: 6px 24px;
        cursor: pointer;
    }

    .regButton:hover {
        background: #ccc;
    }

    #block {
        width: 350px;
        height: 530px;
        margin: 40px auto;
        background: #fff;
        border: 1px solid #fff;
        border-radius: 15px;
        z-index: 150; display: none;
        position: fixed; left: 0;right: 0;top:0;bottom: 0;
    } 
    #block2 {
        width: 350px;
        height: 350px;
        margin: 40px auto;
        background: #fff;
        border: 1px solid #fff;
        border-radius: 15px;
        z-index: 150; display: none;
        position: fixed; left: 0;right: 0;top:0;bottom: 0;
    } 
    .form{
        width: 275px; margin: -15px auto 20px auto; text-align: center;} 
    .input{
            width: 260px;padding: 5px; margin-bottom: 10px; } 
    .radio{
        margin-bottom: 10px;} .close{margin: 10px 0 0 320px;cursor: pointer;border: 1px solid #ccc; padding: 2px; background: #ccc;} .close:hover{
            background: #fff;} 
    #gray{opacity: 0.8; padding: 15px;
        background-color: rgba(1,1,1,0.75); position: fixed; left: 0;right: 0;top:0;bottom: 0; display: none; z-index:100; overflow: auto; } 
    #gray2{opacity: 0.8; padding: 15px;
        background-color: rgba(1,1,1,0.75); position: fixed; left: 0;right: 0;top:0;bottom: 0; display: none; z-index:100; overflow: auto; } 
    body { background: gold; }
    .radio2{
        color: black;
    }
   </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQService</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>   
        <div class="nav">
        <nav>
            <ul class="nav">
            </ul>
        </nav>
        </div>
        <div class="bg-white">
            <div class="header">
                <div class="wrapper">
                    <div class="header-top">
                        <div class="logo"><span class="logo-image"></span><span>EQService</span></div>
                        <a href="adminMeneger.php">Клиенты</a>
                        <a href="adminMeneger(2).php">Работники</a>
                        <a href="adminMeneger(3).php">Заказ</a>
                        <a href="adminMeneger(4).php">Услуги</a>
                        <a href="adminMeneger(5).php">Сообщения</a>
                        <div class="header-info">
                            <br><a href='http://a0823172.xsph.ru/admin/admin.php' class='grid-btn'>Выход</a></div>
                        </div>
                    </div>
                </div>
                <hr> 
            </div>
        </div>
    </header>
<?php
$conn = new mysqli("localhost", "a0823172_eqservise23", "1111", "a0823172_eqservise23");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM job";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<h2>Таблица работники</h2>";
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Должность</th><th>ФИО</th><th>Логин</th><th>Пароль</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["IDKind"] . "</td>";
            echo "<td>" . $row["KindOfActivity"] . "</td>";
            echo "<td>" . $row["FIO"] . "</td>";
            echo "<td>" . $row["login"] . "</td>";
            echo "<td>" . $row["pass"] . "</td>";
            echo "<td><form action='delete/delete(2).php' method='post'>
                        <input type='hidden' name='IDKind' value='" . $row["IDKind"] . "' />
                        <input type='submit' value='Удалить'>
                </form></td>";
                echo "<td><a href='update/update(2).php?IDKind=" . $row["IDKind"] . "'>Изменить</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>

</body>
<meta charset="utf-8" />
<h3>Добавление работника</h3>
<form action="create/create(2).php" method="post">
    <p>Должность:
    <input type="text" name="KindOfActivity" /></p>
    <p>ФИО:
    <input type="text" name="FIO" /></p>
    <p>Логин:
    <input type="text" name="login" /></p>
    <p>Пароль:
    <input type="password" name="pass" /></p>
    <input type="submit" value="Добавить">
</form>
</html>