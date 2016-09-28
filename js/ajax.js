function showAjax(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("retour").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("retour").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "Vue/AjaxSelectTheme.php?idTheme="+str, true);
  xhttp.send();
}

function showCheckbox(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("retour").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("retour").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "Vue/AjaxcheckboxTheme.php?idTheme="+str, true);
  xhttp.send();
}
