<?php require_once 'inc/functions7.php'; ?>




<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Бронирование номера</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="interkassa-verification" content="e85c95fb2e97dbd83f61c51314eb1e4f" />
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">



</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" "clickable-div'>
                <form class="login100-form validate-form flex-sb flex-w" id="formPrice" data-name="formData">
                    <span class="login100-form-title p-b-53">
                        Номер телефона
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input id="phone1" class="input100" type="tel" name="tel" placeholder="+7 (999) 999-99-99" required>
                        <span class="focus-input100"></span>
                    </div>

                    <p>
                        <label for="date">Дата заезда: </label>
                        <input class="input100" type="date" id="date_in" name="date_in" required />
                    </p>
                    <p>
                        <label for="time">Время заезда: </label>
                        <input class="input100" type="time" id="time_in" name="time_in" required />
                    </p>
                    <p>
                        <label for="date">Дата выезда: </label>
                        <input class="input100" type="date" id="date_out" name="date_out" required />
                    </p>
                    <p>
                        <label for="time">Время выезда: </label>
                        <input class="input100" type="time" id="time_out" name="time_out" required />
                    </p>

                    <select class="input100" name="hotel_number" required>
                        <option>Номер 1</option>
                        <option>Номер 2</option>
                        <option>Номер 3</option>
                        <option>Номер 4</option>
                    </select>

                    <span class="login100-form-title p-b-53">
                        Сумма к оплате
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input id="out1" class="input100" readonly> </input>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <a href="" class="login100-form-btn " id="btn_checkPay">
                           <button class ="login100-form-btn" >Оформить оплату</button>
                            
                        </a>
                    </div>


                </form>
            </div>
        </div>
    </div>



  

    <div class="modal fade" id="modal_pay">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Оформление покупки</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id=modal_form_pay method="post">
                        <div class="form-group">
                            <label for="name">Номер телефона </label>
                            <input type="name" class="form-control" id="num_tel" name = "phone_number" required readonly >
                        </div>
                        <div class="form-group">
                            <label for="name">Номер отеля </label>
                            <input type="text" class="form-control" id="num_hotel" name = "room_number" required readonly >
                        </div>
                        <div class="form-group">
                            <label for="name">Дата заезда </label>
                            <input type="date" class="form-control" id="num_date_in"  name = "date_check_in" required readonly >
                        </div>
                        <div class="form-group">
                            <label for="name">Время заезда </label>
                            <input type="time" class="form-control" id="num_time_in" name = "time_check_in" required readonly >
                        </div>
                        <div class="form-group">
                            <label for="name">Дата выезда </label>
                            <input type="date" class="form-control" id="num_date_out" name = "date_check_out" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Время выезда </label>
                            <input type="time" class="form-control" id="num_time_out" name = "time_check_out"  required readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Сумма к оплате </label>
                            <input type="text" class="form-control" id="num_summ_pay" name="payment_summ" required readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">Перейти к оплате</button>
                    </form>

                </div>

            </div>
        </div>
    </div>







    <script src="js/jquery.serializeJSON/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.serializeJSON/jquery.maskedinput.min.js"></script>
    <script src="js/jquery.serializeJSON/jquery.serializejson.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/popper.min.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script src="js/main7.js"> </script>
    <script src="js/modal.js"> </script>



</body>

</html>
