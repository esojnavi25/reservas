$(document).ready(function(){
  $('#makeCancellationBtn').on('click', function(e) {
    // alert('hola');
    var cancelURL = "/reservation/cancellations/";
    // var number = parseInt($('#cancellationNumber').value(), 10);
    var number = $('#cancellationNumber').val();
    window.location.href = baseUrl + cancelURL + number;
  });
});

var baseUrl = window.location.protocol + "//" + window.location.host;
