function showResults(str) {
    if (str.length === 0) {
        document.getElementById("matches").innerHTML = "";
        document.getElementById('btn').style = 'display: none';
    } else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("matches").innerHTML = this.responseText;
                document.getElementById('btn').style = 'display: block';
            }
        };
        xmlhttp.open("GET", "search_ajax.php?q=" + str, true);
        xmlhttp.send();

    }
}
function showPagination(dat) {
    let xHr = new XMLHttpRequest();
    xHr.onreadystatechange = function () {
        if(this.readyState === 4 && this.status === 200 ){
            document.getElementById("matches").innerHTML = this.responseText;
        }
    };
    let str = document.getElementById('curResult').innerText;

    xHr.open("GET", "search_ajax.php?q=" + str +"&page="+ dat, true);
    xHr.send();
}

