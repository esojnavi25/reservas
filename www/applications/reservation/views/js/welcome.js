$(document).ready(function(){
  $('#makeCancellationBtn').on('click', function(e) {

    e.preventDefault();

    var number = $('#cancellationNumber').val();
    if( number && number != 0 && number != 1){
        window.location.href = baseUrl + cancelURL + number;
    }
  });
});
var baseUrl = window.location.protocol + "//" + window.location.host;
var cancelURL = "/reservation/cancellations/";
