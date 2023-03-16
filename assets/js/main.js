const element  = document.getElementById('controle_mode');
const arrosage  = document.getElementById('arrosage');
const temperature  = document.getElementById('temperature');
const humidity = document.getElementById('humidity');

// If the checkbox is checked, display the output text


document.onload =  function() {
  arrosage.style.display = "none";
  temperature.style.display = "none";
  humidity.style.display = "none";
  temperature.style.display = "none";
  if (element.checked == true){
    temperature.style.display = "flex";
    humidity.style.display = "flex";
    arrosage.style.display = "none";
    ventilation.style.display = "none";
    console.log("Ok")
  } else {
      temperature.style.display = "none";
      humidity.style.display = "none";
      arrosage.style.display = "flex";
      ventilation.style.display = "flex";
  }
}


element.onclick =  function() {
    if (element.checked == true){
      temperature.style.display = "flex";
      humidity.style.display = "flex";
      arrosage.style.display = "none";
      ventilation.style.display = "none";
    } else {
        temperature.style.display = "none";
        humidity.style.display = "none";
        arrosage.style.display = "flex";
        ventilation.style.display = "flex";
    }
}





