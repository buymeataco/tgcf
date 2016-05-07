function processForm() {
	var submittedSearchString = document.getElementById("search").value;
	submitXMLhttpRequest(submittedSearchString);
}

function submitXMLhttpRequest(submittedSearchString) {
    var hr = new XMLHttpRequest();
    var url = "queries.php";
    var vars = "smartSearch="+submittedSearchString;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        document.getElementById("results").innerHTML = return_data;
      }
    }
    hr.send(vars);
}
