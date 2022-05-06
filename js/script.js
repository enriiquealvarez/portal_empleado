// Set the date we're counting down to
// Establecer la fecha aqui, en formato ingles
var countDownDate = new Date("May 31, 2022 23:59:59").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("days").innerHTML =  days;
  document.getElementById("hours").innerHTML =  hours;
  document.getElementById("minutes").innerHTML =  minutes;
  document.getElementById("seconds").innerHTML =  seconds;

  // aqui añadimos nuestra funcion, para que se segun 
  // el conteo regresivo anime los circulos
  effectCircle(days, hours, minutes, seconds);

}, 1000);

effectCircle = function(d, h, m, s){
    // valores maximos
    const max_sec = 60;
    const max_min = 60;
    const max_hour = 24;
    const max_day = 30;

    // valor del relleno del contorno
    // ojo es el mismo establecido en la hoja de estilos
    const strokeDashoffset = 439; 

    var circleSVG = document.getElementsByClassName('outer');

    // circulo dias
    var valPerDay = strokeDashoffset / max_day; // el valor de cada periodo segun la longitud del circulo
    var size = strokeDashoffset - (valPerDay * d); // restamos el valor del periodo a la longitud del circulo
    circleSVG[0].style.strokeDashoffset = size; // establemos nuevo valor al la longitud del circulo

    // circulo horas
    var valPerHour = strokeDashoffset / max_hour;
    var size = strokeDashoffset - (valPerHour * h);
    circleSVG[1].style.strokeDashoffset = size;

    // circulo minutos
    var valPerMin = strokeDashoffset / max_min;
    var size = strokeDashoffset - (valPerMin * m);
    circleSVG[2].style.strokeDashoffset = size;

    // circulo segundos
    var valPerSecond = strokeDashoffset / max_sec;
    var size = strokeDashoffset - (valPerSecond * s);
    circleSVG[3].style.strokeDashoffset = size;

}