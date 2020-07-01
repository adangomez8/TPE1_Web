"use strict"

let app = new Vue({
    el: "#add-books",
    data: {
        libros: []
    }
});


let btnLibs = document.querySelector("#mostrarLibs");
btnLibs.addEventListener('click', mostrarLibros);

function mostrarLibros(){
    fetch('api/libros')
        .then(response => response.json())
        .then(books=>{ 
            app.libros = books;
            console.log(books);
        }); 
}
