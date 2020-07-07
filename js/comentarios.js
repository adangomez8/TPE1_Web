"use strict"; 

let id= document.querySelector("#administrador").value;

let app = new Vue({
    el: "#take-comments",
    data: {
        comentarios: [],
        promedio: 0,
        user: id
    },
    methods: {
        deleteComentario: function(id){
            deleteComent(id);
        }
    }
});

showComents(); //MUESTRA COMENTARIOS


//-------------------------------------------------FUNCIÓN TRAER COMENTARIOS----------------------------------

function showComents(){
    let idLibro= document.querySelector("#idLibro").value;
    fetch('api/libro/' + idLibro +'/coment')
    .then(response => response.json())
    .then(coments => {
        app.comentarios = coments;

//--------------------------FUNCIÓN PROMEDIO----------------------------------------------
        let suma=0;
        let contador=0;
        for (let comentario of coments){
            suma= suma + parseInt(comentario.puntuacion);
            contador ++;
        }
        app.promedio= (suma/contador);
        if (isNaN(app.promedio)){
            app.promedio=0;
        }

})
.catch(error =>console.log(error));
}


//-------------------------------------------------FUNCIÓN SUBIR COMENTARIO------------------------------------

let formulario  = document.querySelector('#formComent');
formulario.addEventListener('submit', addComment);

function addComment(){
    event.preventDefault();


    let text= document.querySelector('#comentarioLib').value;
    let puntaje= document.querySelector('#puntuacion').value;
    let idUser= document.querySelector('#idUser').value;
    let idLibro= document.querySelector('#idLibro').value;
    let url= 'api/libro/' + idLibro + '/coment';


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
        .then(function (){
            document.querySelector("#comentarioLib").value=" ";
            document.querySelector("#puntuacion").value=" ";
            showComents();
        })
        .catch(error =>console.log(error));
    }
}


//-------------------------------------FUNCIÓN ELIMINAR COMENTARIO--------------------------

function deleteComent(id){
    fetch('api/comentario/' + id, {
        method: 'DELETE',
        headers: {'Content-Type': 'application/json'}
    })
    .then(response => {
        console.log(response);
    })
    .catch(error => console.log(error));
    location.reload();
}