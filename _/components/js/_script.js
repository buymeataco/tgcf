function processForm() {
	var submittedSearchString = document.getElementById("search").value;
	console.log(submittedSearchString);
	submitXMLhttpRequest(submittedSearchString);
}

function submitXMLhttpRequest(submittedSearchString) {
    var hr = new XMLHttpRequest();
    var url = "queryLookup.php";
    var smartSearchQuery = submittedSearchString;
    console.log(smartSearchQuery);
    var vars = "smartSearch="+smartSearchQuery;
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
