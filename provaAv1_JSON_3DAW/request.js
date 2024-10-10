function httpRequest(tipo, url, dados){

    let xmlhttp = new XMLHttpRequest();

    let msg;

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
            return this.responseText;
        } else if (this.readyState < 4) {
            console.log("estado: " + this.readyState);
        } else {
            console.log("Requisicao falhou: " + this.status);
        }
}

xmlhttp.open(tipo, url);
xmlhttp.setRequestHeader("Content-Type", "application/json");
xmlhttp.send(JSON.stringify(dados));
}