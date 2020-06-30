"use strict"

let btnLibs = document.querySelector("#mostrarLibs");
btnLibs.addEventListener('click', mostrarLibros);
let listaLibs = document.querySelector("#listaLibs");

function mostrarLibros(){
    fetch('api/libros/')
        .then(response => response.json())
        .then(libros=>{ 

            for (let libro of libros){

                console.log(libros)

                let html = `
                <li><a class="btn btn-outline-success" href="infoLibros/${libro.id_libro}">${libro.Nombre}</li></a>
                `;

                listaLibs.innerHTML += html;
                };
        }); 
}