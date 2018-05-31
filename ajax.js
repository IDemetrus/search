function showResults(str) {
    if (str.length === 0) {
        document.getElementById("matches").innerHTML = "";
        document.getElementById('btn').style = 'display: none';
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("matches").innerHTML = this.responseText;
                document.getElementById("matches").style = 'display: none';
                document.getElementById('btn').style = 'display: none';
                let ol = document.getElementById("matches");
                let li = ol.getElementsByTagName("li");
                var countryName = document.getElementById("curResult").innerText;
                var country = [];
                for (let i = 0; i < li.length; i++) {
                    country[i] = li[i].innerText;
                    let myGeocoder = ymaps.geocode('city+'+country[i]+', '+countryName, { results : 1 });
                    myGeocoder.then(
                        function (res) {
                            myMap.geoObjects.removeAll();
                        }
                    );
                }
            }
        };
        xmlhttp.open("GET", "search_ajax.php?q=" + str, true);
        xmlhttp.send();
    } else {
        if(str.length >=3 ) {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("matches").style = 'display: box';
                    document.getElementById("matches").innerHTML = this.responseText;
                    document.getElementById('btn').style = 'display: block';
                    let ol = document.getElementById("matches");
                    let li = ol.getElementsByTagName("li");
                    var countryName = document.getElementById("curResult").innerText;
                    var country = [];
                    for (let i = 0; i < li.length; i++) {
                        country[i] = li[i].innerText;

                        let myGeocoder = ymaps.geocode('city+'+country[i]+', '+countryName, { results : 1 });
                        myGeocoder.then(
                            function (res) {
                                myMap.geoObjects.add(res.geoObjects);
                            }
                        );
                    }
                }
            };
            xmlhttp.open("GET", "search_ajax.php?q=" + str, true);
            xmlhttp.send();
        }
    }
}

function showPagination(dat) {
    let xHr = new XMLHttpRequest();
    xHr.onreadystatechange = function () {
        if(this.readyState === 4 && this.status === 200 ){
            document.getElementById("matches").innerHTML = this.responseText;
            let ol = document.getElementById("matches");
            let li = ol.getElementsByTagName("li");
            var countryName = document.getElementById("curResult").innerText;
            var country = [];
            for (let i = 0; i < li.length; i++) {
                country[i] = li[i].innerText;
                let myGeocoder = ymaps.geocode('city+'+country[i]+', '+countryName, { results : 1 });
                myGeocoder.then(
                    function (res) {
                        myMap.geoObjects.add(res.geoObjects);
                    }
                );
            }
        }
    };
    let str = document.getElementById('curResult').innerText;
    xHr.open("GET", "search_ajax.php?q=" + str +"&page="+ dat, true);
    xHr.send();
}