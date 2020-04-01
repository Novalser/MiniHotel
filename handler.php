<?php

if (empty($_POST)) {
   die ;
}

require_once 'inc/database7.php';

$key = '9EE2ZHcLqEfWHUU9';

$ik_id = '5dffc1491ae1bd1b008b459b';

$dataSet = $_POST;

unset($dataSet['ik_sign']); 
ksort($dataSet, SORT_STRING); 
array_push($dataSet, $key); 
$signString = implode(':', $dataSet); 
$sign = base64_encode(md5($signString, true));

$sql_3 = 'SELECT *  FROM `hotels_orders7` WHERE `id` = ? ';
    
        $query = $pdo->prepare($sql_3);
        $query->execute([(int)$dataSet['ik_pm_no']]);
        $order = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!$order) die;
        if ($dataSet['ik_co_id']!= $ik_id || $dataSet['ik_inv_st']!= 'success' || $sign != $_POST['ik_sign']){
            die;
        }
        
        $sql = 'UPDATE `hotels_orders7` SET `status` = \'1\' WHERE `hotels_orders7`.`id` = ?';
        $query = $pdo->prepare($sql);
        $query->execute([(int)$dataSet['ik_pm_no']]);


?>