<?php

echo ('Оплата прошла успешно');

if (empty($_POST)) {
   die ;
}

require_once '../inc/database7.php';

$key = '9EE2ZHcLqEfWHUU9';

$ik_id = '5dffc1491ae1bd1b008b459b';

$dataSet = $_POST;

if ($dataSet['ik_co_id']!= $ik_id || $dataSet['ik_inv_st']!= 'success'){
            die;
        }


$sql_3 = 'SELECT *  FROM `hotels_orders7` WHERE `id` = ? ';
    
        $query = $pdo->prepare($sql_3);
        $query->execute([(int)$dataSet['ik_pm_no']]);
        $order = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!$order) die;
        
        
     
        
        
        $phone_number = $order[0]["phone_number"];
        $data_in =  $order[0]["date_check_in"];
        $time_in =  $order[0]["time_check_in"];
        $data_out =  $order[0]["date_check_out"];
        $time_out =  $order[0]["time_check_out"];
        $hotel_number = $order[0]["room_number"];



switch ($hotel_number) {
    case 'Номер 1';
    $hotel_name = 'Номер 1';
    $hotel_number = 3;
    $accses_temp = 2;
    break;
    case 'Номер 2';
    $hotel_name = 'Номер 2'; 
    $hotel_number = 5; 
    $accses_temp = 3;
    break; 
    case 'Номер 3';
    $hotel_name = 'Номер 3';
    $hotel_number = 6;
    $accses_temp = 4;
    break;
    case 'Номер 4';
    $hotel_name = 'Номер 4';
    $hotel_number = 8;
    $accses_temp = 5;
    break;  
    
}
        
         
        
        $pass= rand(1000, 9999); 
        $number = $pass;

        
$array = array();
while ($number > 0) {
    $x = $number % 10;
    
if ($x == 0){
    $y = strval(decbin(10)); 
} 
    elseif ($x > 1 and $x < 4 ) 
    {
    $y = '00'.strval(decbin($x)).'';
} 
    elseif ($x > 3 and $x < 8 ) 
    {
    $y = '0'.strval(decbin($x)).'';
} 


    elseif ($x == 1){
        $y = '000'.strval(decbin($x)).'';
    }
    else
    {
        $y = strval(decbin($number % 10));
    }
    $array[] = $y;
    
    $number = intval($number / 10); 
}
$array = array_reverse($array);

$perco_num = bindec(''.$array[0].''.$array[1].''.$array[2].''.$array[3].'');
        
        

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://mark.birevia.com:13900/api/system/auth",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"login\" : \"HotelEyes2019\",\r\n\"password\" :  \"NN52HotelHotelEyes2019\"}",
  CURLOPT_HTTPHEADER => array(
  "Content-Type: application/json"
 ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
$tokken = substr($response,10,32);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
 // echo $response;
  echo "<br>";
}
sleep (1);


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://mark.birevia.com:13900/api/users/staff?token=".$tokken."&=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
 
 CURLOPT_POSTFIELDS =>"{\n    \"last_name\": \"$phone_number\",\n     \"first_name\": \"$pass\",\n    \"middle_name\": \"\",\n    \"tabel_number\": \"\",\n    \"hiring_date\": \"2020-01-25\",\n    \"division\": $hotel_number,\n    \"position\": 0,\n    \"work_schedule\": 0,\n    \"access_template\": $accses_temp,\n    \"accompanying\": 0,\n    \"supporting_document\": \"string\",\n    \"supporting_document_number\": \"string\",\n    \"begin_datetime\": \"$data_in\",\n    \"end_datetime\": \"$data_out\",\n    \"identifier\": [\n        {\n            \"identifier\": \"$perco_num\"\n        }\n    ],\n    \"photo\": \"string\",\n    \"additional_fields\": {\n        \"text\": [\n            {\n                \"id\": -5,\n                \"name\": \"Email\",\n                \"type_id\": 5,\n                \"text\": \"\"\n            },\n            {\n                \"id\": -4,\n                \"name\": \"Телефон\",\n                \"type_id\": 4,\n                \"text\": \"\"\n            }\n        ],\n        \"image\": []\n    }\n}",
//  CURLOPT_POSTFIELDS =>"{\n    \"last_name\": \"$phone_number\",\n    \"first_name\": \"1\",\n    \"middle_name\": \"\",\n    \"tabel_number\": \"\",\n    \"hiring_date\": \"$data_in\",\n    \"division\": $hotel_number,\n    \"position\": 0,\n    \"work_schedule\": 0,\n    \"access_template\": 2,\n    \"accompanying\": 0,\n    \"supporting_document\": \"string\",\n    \"supporting_document_number\": \"string\",\n    \"begin_datetime\": \"$data_in $time_in\",\n    \"end_datetime\": \"$data_out $time_out\",\n    \"identifier\": [\n        {\n            \"identifier\": \"$pass\"\n        }\n    ],\n    \"photo\": \"string\",\n    \"additional_fields\": {\n        \"text\": [\n            {\n                \"id\": -5,\n                \"name\": \"Email\",\n                \"type_id\": 5,\n                \"text\": \"\"\n            },\n            {\n                \"id\": -4,\n                \"name\": \"$phone_number\",\n                \"type_id\": 4,\n                \"text\": \"\"\n            }\n        ],\n        \"image\": []\n    }\n}",
//  CURLOPT_POSTFIELDS => "{\n    \"last_name\": \"$phone_number\",\n    \"first_name\": \"1\",\n    \"middle_name\": \"\",\n    \"tabel_number\": \"\",\n    \"hiring_date\": \"$data_in\",\n    \"division\": $hotel_number,\n    \"position\": 0,\n    \"work_schedule\": 0,\n    \"access_template\": 2,\n    \"accompanying\": 0,\n    \"supporting_document\": \"string\",\n    \"supporting_document_number\": \"string\",\n    \"begin_datetime\": \"$data_in $time_in\",\n    \"end_datetime\": \"$data_out $time_out\",\n    \"identifier\": [\n        {\n            \"identifier\": \"$pass\"\n        }\n    ],\n    \"photo\": \"string\",\n    \"additional_fields\": {\n        \"text\": [\n            {\n                \"id\": -5,\n                \"name\": \"Email\",\n                \"type_id\": 5,\n                \"text\": \"\"\n            },\n            {\n                \"id\": -4,\n                \"name\": \"$phone_number\",\n                \"type_id\": 4,\n                \"text\": \"\"\n            }\n        ],\n        \"image\": []\n    }\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 // echo $response;
  echo ("Вы успешно оплатили услугу.");
  echo "<br>";
  echo ("Коды доступа в ".$hotel_name."");
  echo "<br>";
  echo ("уровень 1 - 5555");
  echo "<br>";
  echo ("уровень 2 - 8888");
  echo "<br>";
  echo ("уровень 3 - ".$pass."");
  echo "<br>";
  echo ("Срок действия c ".$data_in." до ".$data_out."");
}





$ch = curl_init("https://sms.ru/sms/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    "api_id" => "8F5B2D46-2C1E-4A30-8FED-D2CAEB0F93BF",
    "to" => "$phone_number", // До 100 штук до раз
    "msg" =>  "Вы успешно оплатили услугу. Ваш код доступа в ".$hotel_name." - уровень 1 - 5555,  уровень 2 - 8888, уровень 3 - ".$pass."  Срок действия до  $data_out", // Если приходят крякозябры, то уберите iconv и оставьте только "Привет!",

    





    /*
    // Если вы хотите отправлять разные тексты на разные номера, воспользуйтесь этим кодом. В этом случае to и msg нужно убрать.
    "multi" => array( // до 100 штук за раз
        "79200727625"=> iconv("windows-1251", "utf-8", "Привет 1"), // Если приходят крякозябры, то уберите iconv и оставьте только "Привет!",
        "74993221627"=> iconv("windows-1251", "utf-8", "Привет 2") 
    ),
    */




    
    "json" => 1 // Для получения более развернутого ответа от сервера
)));

$body = curl_exec($ch);
curl_close($ch);

$json = json_decode($body);
if ($json) { // Получен ответ от сервера
   // print_r($json); // Для дебага
    if ($json->status == "OK") { // Запрос выполнился
        foreach ($json->sms as $phone => $data) { // Перебираем массив СМС сообщений
            if ($data->status == "OK") { // Сообщение отправлено
                echo "<br>";
                echo "Сообщение на номер $phone успешно отправлено. ";
                echo "ID сообщения: $data->sms_id. ";
                echo "";
            } else { // Ошибка в отправке
                echo "Сообщение на номер $phone не отправлено. ";
                echo "Код ошибки: $data->status_code. ";
                echo "Текст ошибки: $data->status_text. ";
                echo "";
            }
        }
        echo "Баланс после отправки: $json->balance руб.";
        echo "";
    } else { // Запрос не выполнился (возможно ошибка авторизации, параметрах, итд...)
        echo "Запрос не выполнился. ";      
        echo "Код ошибки: $json->status_code. ";
        echo "Текст ошибки: $json->status_text. ";
    }
} else { 

    echo "Запрос не выполнился. Не удалось установить связь с сервером. ";

}
    
   
        
      $sql = 'UPDATE `hotels_orders7` SET `status` = \'2\' WHERE `hotels_orders7`.`id` = ?';
      $query = $pdo->prepare($sql);
      $query->execute([(int)$dataSet['ik_pm_no']]);


?>