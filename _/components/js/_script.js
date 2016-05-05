function processForm() {
	var submittedSearchString = document.getElementById("search").value;
	submitXMLhttpRequest(submittedSearchString);
}

function submitXMLhttpRequest(submittedSearchString) {
    var hr = new XMLHttpRequest();
    var url = "searchLookup.php";
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

// function checkEmail() {
//     var email = document.getElementById('txtEmail');
//     var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//         if (!filter.test(email.value)) {
//             alert('Please provide a valid email address.');
//             email.focus;
//             return false;
//         }
// }
