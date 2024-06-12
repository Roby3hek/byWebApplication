<?php
if (isset($_POST['fio']) && isset($_POST['adress'])&& isset($_POST['number'])){
    // Переменные с формы
    $fio = $_POST['fio'];
    $adress = $_POST['adress'];
    $number = $_POST['number'];
    
    
    // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "a0823172_eqservise23"; // Логин БД
    $db_password = "1111"; // Пароль БД
    $db_base = 'a0823172_eqservise23'; // Имя БД
    $db_table = "sales"; // Имя Таблицы БД
    
    try {
        if (empty($fio)){
            echo ("Введите фио <br>");
        }
        if (empty($adress)){
            echo ("Введите адрес <br>");
        }
        if (empty($number)){
            echo ("Введите номер телефона <br>");
        }
        else{
            // Подключение к базе данных
            $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
            // Устанавливаем корректную кодировку
            $db->exec("set names utf8");
            // Собираем данные для запроса
            $data = array('title_id'=>"3",'fio' => $fio, 'adress' => $adress, 'number' => $number ); 
            // Подготавливаем SQL-запрос
            $query = $db->prepare("INSERT INTO $db_table (title_id, fio, adress, number) values (:title_id, :fio, :adress, :number)");
            // Выполняем запрос с данными
            $query->execute($data);
            // Запишим в переменую, что запрос отрабтал
            $result = true;
        }
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    
    if ($result) {
    	echo "Заказ успешно оформлен";
        
    }
}?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <script type="php">
    
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="index_form.css">
    <style>
            * {
                margin-left: 2;
                margin-top: 1;
                margin-bottom: 1;
                margin-right: 3;
                padding: 1;
                font-family:Montserrat ;
                font-style: normal;
            }
            input {
                width:320px;
                height:40px;
            }
            
            
            
        </style>
<title>Форма заказа хим.чистки</title>
<meta name = viewport content = "width=device-width, initial-scale=1">
</head>
<body>
    <div class="EQServise">
              <p>EQServise</p> 
    </div>
    <form method="POST" action="">
    <div>
        <p class="FIO1" >Введите ФИО</p>
        <input name="fio" type="text" autocorrect=off autocapitalize = words placeholder="Туманян Робэн Александрович"/>
    </div>
    <div>
        <p class="FIO1" >Введите адрес</p>
        <input name="adress" type="text" autocorrect=off autocapitalize = words  placeholder="Пушкина 12"/>
    </div>
    <div>
        <p  class="NUM1" >Введите номер телефона</p>
        <input name="number" type="tel"  autocorrect=off autocapitalize = words placeholder="9997774411"/>
    </div>
    <div class ="but">
        <input type="submit" value="Оплатить наличными"/>
    <iframe src="https://yoomoney.ru/quickpay/button-widget?targets=%D0%9E%D0%BF%D0%BB%D0%B0%D1%82%D0%B0%20%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8%20%D1%8D%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%B8%D0%BA%D0%B0&default-sum=2&button-text=11&any-card-payment-type=on&button-size=m&button-color=orange&successURL=&quickpay=small&account=4100117784826418&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
    </div>
    </form>
</body>
</html>
