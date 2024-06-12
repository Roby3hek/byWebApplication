<?php
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) 
&& isset($_POST['password']) && isset($_POST['password2'])){
    
    // Переменные с формы
    $name = $_POST['name'];//присваиваем имя полей ввода в HTML к PHP
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    
    $db_host = "localhost"; 
    $db_user = "a0823172_eqservise23"; // Логин БД
    $db_password = "1111"; // Пароль БД
    $db_base = 'a0823172_eqservise23'; // Имя БД
    $db_table = "klients"; // Имя Таблицы БД
    
    try {
        // Подключение к базе данных
        $position = true;
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        
        if($name and $surname and $email and $password and $number = ""){
            echo "<script>alert('Заполните все поля')</script>";
        } else if($password != $password2) {
            echo "<script>alert('Пароли не совпадают')</script>";
        }else{
            // Собираем данные для запроса
            $data = array( 'name' => $name, 'surname' => $surname, 
            'email' => $email, 'password' => $password);
            // Подготавливаем SQL-запрос
            $query = $db->prepare(" INSERT INTO $db_table (name, surname, email, password)
            values ('{$name}', '{$surname}', '{$email}', '{$password}')");
            // Выполняем запрос с данными
            $query->execute($data);
            // Запишем в переменую, что запрос отрабтал
            $result = true;
        }
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    
    if ($result) {
    	print "<div class='lk'>Добро пожаловать, {$name}" ." <a href='/' class='grid-btn'>Выход</a></div>"; 
    }
    
}

    else if (isset($_POST['email']) && isset($_POST['password'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $db_host = "localhost"; 
        $db_user = "a0823172_eqservise23";
        $db_password = "1111"; 
        $db_base = 'a0823172_eqservise23';
        $db_table = "klients"; 
        
        try {
        $position = true;
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        
        {
            
            // Подготавливаем SQL-запрос
            $query = $db->prepare("SELECT * from $db_table where email = '$email' and password = '$password' ");
            // Выполняем запрос с данными
            $query->execute($data);
            // Запишим в переменую, что запрос отрабтал
            $result = $query->fetchAll();
            //var_dump($result[0]);
            if($result[0]!=null){
            print "<div class='lk'>Добро пожаловать, {$result[0]['name']}" . "<br><br><a href='promo.php' class='grid-btn'>Получить промокод</a></div>" ."<br><br> <a href='/' class='grid-btn'>Выход</a></div>";    
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
    .p {
        font-size="64px"
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
    #block3 {
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
    #gray3{opacity: 0.8; padding: 15px;
        background-color: rgba(1,1,1,0.75); position: fixed; left: 0;right: 0;top:0;bottom: 0; display: none; z-index:100; overflow: auto; } 
    body { background: gold; }
    .radio2{
        color: black;
    }
    .t11{
        font-size:20px;
    }
    .t12{
        font-size:20px;
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
                            
                            
                            <form action = "contact.php">
                                <button>Обратная связь</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
                <hr> 
            </div>
        </div>
    </header>
    <section class="banner"><br>
        <div class="wrapper">
            <div class="t11">
                <h1>EQService</h1>
            </div>
            <div class="t12"><p >Сервис для заказа услуг сантехника, электрика, ремонта техники, а так же клининговой службы</p>
            <p >Зарегестрируйтесь, чтобы получить скидку 10% на заказ услуг электрика</p><br>
            </div>
            
            <a onclick="show('block')" class="btn">Регистрация</a>
             <a onclick="show2('block')" class="btn">Вход</a>
            <div onclick="show('none')" id="gray"></div>
            <div id="block">
                <!-- Картинка крестика -->
                <img class="close" src="img/close.png" alt=""  onclick="show('none')">
                <div class="form">
                    <h2>Регистрация</h2>
                    <form method="POST" action="" name="f1" id="f1">
                        <input type="text"  placeholder="Имя" title="От 3 до 20 символов" name="name" class="input">
                        <input type="text"  placeholder="Фамилия" title="От 3 до 20 символов" name="surname" class="input">
                        <input type="email"  placeholder="Email" title="В формате xxx@x.x" name="email" class="input">
                        <input type="password" placeholder="Пароль" title="От 3 до 15 символов" name="password" class="input">
                        <input type="password" placeholder="Подтвердите пароль" title="От 3 до 15 символов" name="password2" class="input">
                        <input type="tel" placeholder="Номер телефона" title="в формате 89042437787" name="number" class="input">
                        <input  type="submit" value="Зарегестрироваться" name="sab" class="send-btn">
                        <p href="#" class="font">Нажимая зарегестрироваться вы принимаете политику конфиденциальности</p>
                    </form>
                </div>
            </div>
            <div id="block2">
                <!-- Картинка крестика -->
                <img class="close" src="img/close.png" alt=""  onclick="show2('none')">
                <div class="form">
                    <h2>Авторизация</h2>
                    <form method="POST" action="" name="f2" id="f2">
                       <input type="email"  placeholder="Email" title="В формате xxx@x.x" name="email" class="input">
                        <input type="password" placeholder="Пароль" title="От 3 до 15 символов" name="password" class="input">
                       <input  type="submit" value="Вход" name="sab" class="send-btn">
                      </form>
                </div>
            </div>
            <div id="block">
                <!-- Картинка крестика -->
                <img class="close" src="img/close.png" alt=""  onclick="show3('none')">
                <div class="form">
                    <h2>Обратная связь</h2>
                    <form method="POST" action="" name="f3" id="f3">
                       <input type="email"  placeholder="Email" title="В формате xxx@x.x" name="email" class="input">
                        <input type="password" placeholder="Пароль" title="От 3 до 15 символов" name="password" class="input">
                       <input  type="submit" value="Вход" name="sab" class="send-btn">
                      </form>
                </div>
            </div>
        <script>
             //Функция показа
            function show(state)
            {
                document.getElementById('block').style.display = state;	
                document.getElementById('gray').style.display = state; 		
            }	
        </script>
         <script>
             //Функция показа
            function show2(state)
            {
                document.getElementById('block2').style.display = state;	
                document.getElementById('gray2').style.display = state; 		
            }	
        </script>
        <script>
             //Функция показа всплывающего окна
            function show3
            {
                alert('Мобильное приложение находится на этапе разработки, приносим свои извинения.');
            }	
        </script>
        </div>
    </section>
       <div class="grid-item grid-item-catalog">
                    <div class="bg-white">
                        <div class="thumb">
                            <img src="img/san.svg" alt="Chair">
                            <img src="img/el.svg" alt="Chair">
                            <img src="img/him.svg" alt="Chair">
                            <img src="img/rem.svg" alt="Chair">
                        </div>
                        <p class="grid-title">Услуги сантехника, электрика, клининга и ремонта бытовых приборов у Вас дома</p>
                        <p class="grid-price">от 800р</p>
                    </div>
                </div>
    <section>
        <div class="wrapper">
            <div class="grid">
                
                <div class="grid-item grid-item-img">
                    <img src="img/car.svg" alt="Delivery">
                </div>
                
                <div class="grid-item grid-item-left">
                    <div class="bg-green">
                        <div class="bg-green-item">
                            <h3>Оформляйте заказ с помощью нашего телеграмм бота</h3>
                            <p><br> <a href="https://app.leadteh.ru/w/o3zD" class="btn">Перейти в телеграмм</a></p>
                            
                            
                        </div>
                        
                    </div>
                </div>
                <div class="grid-item grid-item-right">
                    <div class="bg-green">
                        <div class="bg-green-item">
                            <h3>Оформляйте услуги в нашем мобильном приложении</h3>
                            <a onclick="show3" class="btn">Скачать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="bg-white">
            <div class="wrapper">
                <div class="footer-top">
                    <div class="footer-top-item">
                        <ul class="social" >
                            <li class="social-item" ><a class="social-link social-youtube" href="" target="_blank" ></a></li>
                            <li class="social-item" ><a class="social-link social-vk" href="https://vk.com/be1kaeb" target="_blank" ></a></li>
                            <li class="social-item" ><a class="social-link social-instagram" href="https://instagram.com/roby3hek" target="_blank" ></a></li>
                        </ul>
                    </div>
                    <div class="footer-info">
                        <span>ул.Крымская, дом 19, СКМиЭ при СГТУ им. Гагарина Ю.А.</span>
                        <span>+7(937)-242-83-40</span>
                        <form action = "contact.html">
                            <button>Обратная связь</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="footer-bottom">
                <p>Лучший сервисный центр (с) 2022 Все права защищены.</p>
                
                <a href="pol.html">Политика конфиденциальности</a>
            </div>
        </div>
    </footer>
</body>
</html>


