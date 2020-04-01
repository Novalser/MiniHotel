$('#btn_checkPay').click(function () {
    let form = $('#formPrice');
    let formData = form.serializeJSON();

  //  console.log($('#out1').value);

    num_tel.value = formData.tel;
    num_hotel.value = formData.hotel_number;
    num_date_in.value = formData.date_in;
    num_date_out.value = formData.date_out;
    num_time_in.value = formData.time_in;
    num_time_out.value = formData.time_out;
    num_summ_pay.value = formData.hotel_number;

    num_summ_pay.value = out1.value;

    $('#modal_pay').modal();

    return false;
});
