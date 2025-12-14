// Function for start and stop
function initialiseServer(serverStatus) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("textBoxData").innerHTML += this.responseText + "<br>";
    }
  };
  xhttp.open("POST", "./server_controller.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("status=" + serverStatus);
}

// Function for sending command data
function sendCommandData() {
  var commandData = document.getElementById("dataInputBox").value;
  document.getElementById('dataInputBox').value = '';
  
  if (!(commandData === "")) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("textBoxData").innerHTML += this.responseText + "<br>";
      }
    };
    xhttp.open("POST", "./server_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("data=" + commandData);
  }
}