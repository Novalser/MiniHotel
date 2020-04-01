$(document).ready(function() {

	$("#phone1").mask("+7 (999) 999-99-99");
	

});

const form = $('#formPrice');

let formData  = form.serializeJSON();



form.on('keyup change', 'input, select, textarea','div.clickable-div', function(){
  formData = form.serializeJSON();

let date_out = formData.date_out + ' ' + formData.time_out + ':00';

let date_in = formData.date_in + ' ' + formData.time_in + ':00';


let hotel_number = formData.hotel_number;

if (formData.date_in != '' & formData.date_out != ''  & formData.time_out != '' & formData.time_in != '' ) {
  let date_out1 = new Date(date_out.replace(' ', 'T'));
  let date_in1 = new Date(date_in.replace(' ', 'T'));
  let diffDate = date_out1 - date_in1;
  
  let x = Math.round(diffDate/(60000*60));

if (hotel_number == 'Номер 1') {
	hotel_number = 3;
}
else if (hotel_number == 'Номер 2') {
	hotel_number = 5;
}
else if (hotel_number == 'Номер 3') {
	hotel_number = 6;
}
else hotel_number = 8;

out1.value = x*hotel_number*1000;

};

});
