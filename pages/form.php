<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Платеж</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
   
    <p>Через несколько секунды Вы будете перенаправлены на страницу оплаты. Нажмите кнопку, если не хотите ждать...</p>
    
    <?php if(!empty($_SESSION['payment'])): ?>
    
    <form id="payment" name="payment" method="post" action="https://sci.interkassa.com/" enctype="utf-8">
	<input type="hidden" name="ik_co_id" value="5dffc1491ae1bd1b008b459b" />
	<input type="hidden" name="ik_pm_no" value="<?php echo ($_SESSION['payment']['id']);
    ?>" />
	<input type="hidden" name="ik_am" value="<?php echo ($_SESSION['payment']['price']);
    ?>" />
	<input type="hidden" name="ik_cur" value="RUB" />
		<input type="hidden" name="ik_desc" value="Оплата номера" />
        <input type="submit" value="Оплатить">
</form>
    
    
    
    
    <?php endif; ?>
    
    
    
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  
    <script> 
    setTimeout(function(){
     $('form').submit();
 
    }, 5000);
    </script>
    
    
</body>

</html>