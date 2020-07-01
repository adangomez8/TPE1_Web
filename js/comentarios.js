"use strict"

let app = new Vue({
    el: "#add-comments",
    data: {
        comentarios: [],
        verCom: false
    }
});


let btnComen = document.querySelector("#mostrarComen");
btnComen.addEventListener('click', mostrarComentarios);

function mostrarComentarios(){
    fetch('api/comentarios')
        .then(response => response.json())
        .then(commentarys=>{ 
            app.comentarios = commentarys;
            app.verCom = true;
        }); 
}