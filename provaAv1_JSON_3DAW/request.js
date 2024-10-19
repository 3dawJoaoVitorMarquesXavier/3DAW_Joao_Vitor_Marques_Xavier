function httpRequest(tipo, url, dados){
    return new Promise(function(resolve, reject) {
        let xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Chegou a resposta OK: " + this.responseText);
                resolve(this.responseText); 
            } else if (this.readyState < 4) {
                console.log("Estado: " + this.readyState);
            } else if (this.readyState == 4 && this.status !== 200) {
                console.log("Requisição falhou: " + this.status);
                reject(new Error("Request failed with status " + this.status)); 
            }
        };

        xmlhttp.open(tipo, url);
        xmlhttp.setRequestHeader("Content-Type", "application/json");
        xmlhttp.send(JSON.stringify(dados));
    });
}