"use strict"; 

let formulario  = document.querySelector('#formComent');
formulario.addEventListener('submit', addComment);

function addComment(){
    event.preventDefault();


    let text= document.querySelector('#comentarioLib').value;
    let puntaje= document.querySelector('#puntuacion').value;
    let idUser= document.querySelector('#idUser').value;
    let idLibro= document.querySelector('#idLibro').value;
    let url= 'http://localhost/web2/TPE1_Web/api/libro/' + idLibro + '/coment';


    //Se crea el objeto
    let comentario= {
            "texto": text,
            "puntaje": puntaje,
            "idUser": idUser,
            "idLibro": idLibro,
    };
    console.log(comentario);

    if (text == "" || puntaje == ""){
        alert("Faltan campos por completar");
        return false;
    }
    else {
        fetch(url, { 
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify(comentario)
        })
        .then(response => {
            console.log(response);
        })
        .catch(error =>console.log(error));
    }
}