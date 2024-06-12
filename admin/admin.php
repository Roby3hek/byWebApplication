<?php
if (isset($_POST['login']) && isset($_POST['pass'])){
        
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        
        $db_host = "localhost"; 
        $db_user = "a0823172_eqservise23";
        $db_password = "1111"; 
        $db_base = 'a0823172_eqservise23';
        $db_table = "job"; 
        
        try {
        $position = true;
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        
        {
            
            // Подготавливаем SQL-запрос
            $query = $db->prepare("SELECT * from $db_table where login = '$login' and pass = '$pass' ");
            // Выполняем запрос с данными
            $query->execute($data);
            // Запишим в переменую, что запрос отрабтал
            $result = $query->fetchAll();
            //var_dump($result[0]);
            if($result[0]!=null){
            print "<div class='lk'>Вы вошли как, {$result[0]['KindOfActivity']}" ." <a href='http://a0823172.xsph.ru/admin/adminTable/adminMeneger.php' class='grid-btn'>Продолжить</a></div>"." <br><a href='http://a0823172.xsph.ru/admin/admin.php' class='grid-btn'>Выход</a></div>";    
            } else {
                echo "<script>alert('Неверный логин или пароль')</script>";
            }
            
        }
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    }
    
?>

<!DOCTYPE html>
<html lang="ru">
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
                        <div class="header-info">
                            <span>Панель администрирования</span>
                             <a onclick="show2('block')" class="btn">Вход</a>
                        </div>
                    </div>
                </div>
                <hr> 
            </div>
        </div>
    </header>
    <section class="banner">
        <div class="wrapper">
             <a onclick="show2('block')" class="btn">Вход</a>
            <div onclick="show('none')" id="gray"></div>
            <div id="block2">
                <!-- Картинка крестика -->
                <img class="close" src="img/close.png" alt=""  onclick="show2('none')">
                <div class="form">
                    <h2>Авторизация</h2>
                    <form method="POST" action="" name="f2" id="f2">
                       <input type="text"  placeholder="Логин"  name="login" class="input">
                        <input type="password" placeholder="Пароль" title="От 3 до 15 символов" name="pass" class="input">
                       <input  type="submit" value="Вход" name="sab" class="send-btn">
                      </form>
                </div>
            </div>
         <script>
             //Функция показа
            function show2(state)
            {
                document.getElementById('block2').style.display = state;	
                document.getElementById('gray2').style.display = state; 		
            }	
        </script>
        </div>
    </section>
        <div class="wrapper">
            <div class="footer-bottom">
                <p>Лучший сервисный центр (с) 2022 Все права защищены.</p>
                <a href="pol.html">Политика конфиденциальности</a>
            </div>
        </div>
    </footer>
</body>
</html>


