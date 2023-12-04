function enviarParaMySQL() {
    var form = document.getElementById("myForm");
    var data = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", form.action, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Aqui você pode processar a resposta, se necessário
            console.log(xhr.responseText);
        }
    };

    xhr.send(data);
}
