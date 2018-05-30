function countrySuggester()
{
    let country = document.getElementById("country").value;
    let xHreq;
    if (window.XMLHttpRequest) {
        xHreq = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xHreq = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        alert('No request here');
    }
    let result = "query" + country;
    xHreq.open("GET", "index.php", true);
    xHreq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xHreq.send(result);
    xHreq.onreadystatechange = displayCities;
    function displayCities() {
        if (xHreq.readyState === 4) {
            if (xHreq.status === 200) {
                alert(xHreq.responseText);
                document.getElementById("suggester").innerHTML = xHreq.responseText;
            } else {
                alert('There is no result.');
            }
        }
    }
}