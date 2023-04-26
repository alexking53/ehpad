/**
** Auteur :
** Création le :
**/
function fonctionPanier(trace) {
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (httpRequest.readyState === 4) {
            var tab = httpRequest.responseText;
            if (tab.match('<script>')) {
                alert("vous avez déja enregistré ce produit!");
            }
            else {
                document.querySelectorAll("#navigation li")[3].innerHTML = '<a class="nav-link" href="/20222023/ap/ap-07-memory/Panier">Panier</a>' + tab;
            }
        }
    };
    httpRequest.open('GET', trace, true);
    httpRequest.send();
}
function effacerpanier(trace, url1, url2) {
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (httpRequest.readyState === 4) {
            document.querySelector("#" + trace).innerHTML = "";
            var b = 0.0;
            var a = document.querySelectorAll(".prix");
            for (var i = 0; i < a.length; i++) {
                b += parseFloat(a[i].innerText);
            }
            document.querySelector("#total_prix1").innerText = b;
        }
    };
    httpRequest.open('GET', url1, true);
    httpRequest.send();
    fonctionpanier(url2);
}
//Les écouteurs