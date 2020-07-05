"use strict"

let app = new Vue({
    el: "#add-comments",
    data: {
        comentarios: [],
        verCom: false
    }
});

let btnComen = document.querySelector("#mostrarComen");
btnComen.addEventListener('click', showComents);

function showComents(){
    fetch('api/comentario')
    .then(response => response.json())
    .then(coments => {
        app.comentarios = coments;
        app.verCom = true;
    });
}

