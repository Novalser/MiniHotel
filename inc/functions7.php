<?php 
session_start();
$data = [
    'phone_number' => '',
    'room_number' => '',
    'date_check_in' => '',
    'time_check_in' => '',
    'date_check_out' => '',
    'time_check_out' => '',
    'payment_summ' => '',
    ];
    
if(!empty($_POST)){
    require_once 'database7.php';
    $data = load($data);
     $phone_number = $data['phone_number'];
     $room_number = $data['room_number'];
     $date_check_in = $data['date_check_in'];
     $date_check_in1 = ''.$data['date_check_in'].' '.$data['time_check_in'].'';
     $time_check_in = $data['time_check_in'];
     $date_check_out = $data['date_check_out'];
     $date_check_out1 = ''.$data['date_check_out'].' '.$data['time_check_out'].'';
     $time_check_out = $data['time_check_out'];
     
     
     switch ($room_number) {
    case 'Номер 1';
    $hotel_number = 3;
    break;
    case 'Номер 2';
    $hotel_number = 5; 
    break; 
    case 'Номер 3';
    $hotel_number = 6;
    break;
    case 'Номер 4';
    $hotel_number = 8; 
    break;  
    
}
     
     
     $date_check = strtotime($date_check_out)-strtotime($date_check_in) + strtotime($time_check_out) - strtotime($time_check_in) ;

     $paysumm =  $hotel_number * 1000 * intdiv($date_check, 3600);
     $payment_summ = strval ($paysumm);
     
     if ($payment_summ!= $data['payment_summ']) {
         die;
     }
         
     
     
   
    $sql_2 = 'SELECT `id`, `phone_number`,`room_number`, `date_check_in`, `time_check_in`, `date_check_out`, `time_check_out`, `payment_summ`, `status` FROM `hotels_orders7` WHERE `room_number` = ? && `date_check_out` > ?    && `date_check_in` < ?';
    $query_id = $pdo->prepare($sql_2);
    $query_id->execute([$room_number, $date_check_in1, $date_check_out1,]);
    $orders = $query_id->fetchAll(PDO::FETCH_ASSOC);
    $orders_id = $orders[0]["id"];
    $status = $orders[0]["status"];

    
  
   
    
    
    if (empty($orders_id)) {
        
        $sql = 'INSERT INTO hotels_orders7(phone_number, room_number, date_check_in, time_check_in, date_check_out, time_check_out, payment_summ) VALUES(:phone_number,:room_number,:date_check_in,:time_check_in,:date_check_out,:time_check_out,:payment_summ)';
        $query = $pdo->prepare($sql);
        $query->execute(['phone_number'=>$phone_number, 'room_number'=>$room_number, 'date_check_in'=>$date_check_in1, 'time_check_in'=>$time_check_in, 'date_check_out'=>$date_check_out1, 'time_check_out'=>$time_check_out, 'payment_summ'=>$payment_summ]);


        $sql_3 = 'SELECT *  FROM `hotels_orders7` WHERE `phone_number` = ? && `room_number` = ? && `date_check_in` = ? && `time_check_in` = ? && `date_check_out` = ? && `time_check_out` = ? && `payment_summ` = ?';
    
        $query_id = $pdo->prepare($sql_3);
        $query_id->execute([$phone_number, $room_number, $date_check_in1, $time_check_in, $date_check_out1, $time_check_out, $payment_summ]);
        $orders = $query_id->fetchAll(PDO::FETCH_ASSOC);
        $orders_id = $orders[0]["id"];
        
                
        setPaymentData($orders_id,$payment_summ);
       header('Location: pages/form.php');
       die;
           
                
                
 }
    
    elseif ( $status > 0) {
        
            
        echo (' К сожалению '.$orders[0]["room_number"].' на время с '.$orders[0]["date_check_in"].'  до '.$orders[0]["date_check_out"].' забронирован. Выберите другой номер или другую дату');
   
 }
 
 else {
     
     $sql = 'INSERT INTO hotels_orders7(phone_number, room_number, date_check_in, time_check_in, date_check_out, time_check_out, payment_summ) VALUES(:phone_number,:room_number,:date_check_in,:time_check_in,:date_check_out,:time_check_out,:payment_summ)';
        $query = $pdo->prepare($sql);
        $query->execute(['phone_number'=>$phone_number, 'room_number'=>$room_number, 'date_check_in'=>$date_check_in1, 'time_check_in'=>$time_check_in, 'date_check_out'=>$date_check_out1, 'time_check_out'=>$time_check_out, 'payment_summ'=>$payment_summ]);


        $sql_3 = 'SELECT *  FROM `hotels_orders7` WHERE `phone_number` = ? && `room_number` = ? && `date_check_in` = ? && `time_check_in` = ? && `date_check_out` = ? && `time_check_out` = ? && `payment_summ` = ?';
    
        $query_id = $pdo->prepare($sql_3);
        $query_id->execute([$phone_number, $room_number, $date_check_in1, $time_check_in, $date_check_out1, $time_check_out, $payment_summ]);
        $orders = $query_id->fetchAll(PDO::FETCH_ASSOC);
        $orders_id = $orders[0]["id"];
       
       
       
       setPaymentData($orders_id,$payment_summ);
   header('Location: pages/form.php');
    
     
      die;
        
     
 }
    
   
    
}








function setPaymentData($orders_id, $payment_summ) {
    if (isset($_SESSION['payment'])) unset($_SESSION['payment']);
    $_SESSION['payment']['id'] = $orders_id;
    $_SESSION['payment']['price'] = $payment_summ;
   
}



function load($data){
        foreach($_POST as $k => $v) {
     if (array_key_exists($k,$data)) {
         $data[$k] = $v;
     }   
    }
    return $data;
}

?>
