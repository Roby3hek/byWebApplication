<?php
if (isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['message'])){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $db_host = "localhost"; 
        $db_user = "a0823172_eqservise23";
        $db_password = "1111"; 
        $db_base = 'a0823172_eqservise23';
        $db_table = "formS"; 
        
        try {
        // Подключение к базе данных
        $position = true;
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        
        if($name and $email and $message = ""){
            echo "<script>alert('Заполните все поля')</script>";
        }else{
            // Собираем данные для запроса
            $data = array( 'name' => $name, 'email' => $email,  'message' => $message);
            // Подготавливаем SQL-запрос
            $query = $db->prepare(" INSERT INTO $db_table (name, email, message)
            values ('{$name}', '{$email}', '{$message}')");
            // Выполняем запрос с данными
            $query->execute($data);
            // Запишем в переменую, что запрос отрабтал
            $result = true;
        }
        
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    }
    
?>
<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Форма обратной связи</title>
  <link rel="stylesheet" href="css/style2.css">

 
</head>

<body>

  <div class="container">

    <div class="form-container form__wrapper">
      <!-- Форма обратной связи -->
      <form id="feedback-form" action="" method="post"  enctype="multipart/form-data" novalidate>
        <div class="form-row">
          <!-- Имя пользователя -->
          <div class="form-group">
            <label for="name" class="control-label">Имя</label>
            <input id="name" type="text" name="name" class="form-control" value="" placeholder="Имя" minlength="2"
              maxlength="30" required="required">
            <div class="invalid-feedback"></div>
          </div>
          <!-- Email пользователя -->
          <div class="form-group">
            <label for="email" class="control-label">Email-адрес</label>
            <input id="email" type="email" name="email" required="required" class="form-control" value=""
              placeholder="Email-адрес">
            <div class="invalid-feedback"></div>
          </div>
        </div>
        <!-- Сообщение пользователя -->
        <div class="form-group">
          <label for="message" class="control-label">Сообщение (не менее 20 символов)</label>
          <input id="message" type="text" name="message" class="form-control" 
            placeholder="Сообщение (не менее 20 символов)" 
            required="required"  ></input>
          <div class="invalid-feedback"></div>
        </div>
        <!-- Пользовательское солашение -->
        <div class="form-group form-agree form-check">
          <input class="form-check-input" type="checkbox" name="agree" id="agree" required value="true">
          <label class="form-check-label" for="agree">Нажимая кнопку, я принимаю условия <a href=" http://a0823172.xsph.ru/pol.html?">Политики конфиденциальности</a> и даю своё согласие на обработку моих персональных данных</label>
          <div class="invalid-feedback"></div>
        </div>
        <!-- Кнопка для отправки формы на сервер -->
        <a href ="http://a0823172.xsph.ru/" type="submit">На главную</a>
        <div class="form-submit">
            
          <button type="submit">Отправить сообщение</button>
        </div>
      </form>


    </div>

  </div>

</body>

</html>

						