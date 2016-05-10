function processForm() {
	var submittedSearchString = document.getElementById("search").value;
    var checkBoxchecked = document.getElementById("strictSearch").checked;
	submitXMLhttpRequest(submittedSearchString, checkBoxchecked);
}

function submitXMLhttpRequest(submittedSearchString, checkBoxchecked) {
    var hr = new XMLHttpRequest();
    var url = "queries.php";
    var vars1 = "smartSearch="+submittedSearchString;
    var vars2 = "&checkBoxState="+checkBoxchecked;
    var vars = vars1+vars2;
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
