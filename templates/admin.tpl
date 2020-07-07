{include 'navAdmin.tpl'}

<div class="container">
  <div class= "admin">
    
      
        <div>
          <h1>Zona de administración</h1>
          <h3> Seleccione la acción que desea realizar </h3>
        </div>
      
      
  <div>  
  <div class= "row">
        <div class= "col-md-3">
            <p class= "paragrbook">Añadir un nuevo libro</p>
            <picture>
                <a href="{$base_url}nuevoLibro"><img src="img/addbook.jpg" alt="Descripción de la imagen" width= "50px" height= "50px"></a> 
            </picture>
        </div>
        
        <div class= "col-md-3">
            <p class= "pareditbook">Eliminar o editar libros existentes</p>
            <picture>
                <a href="{$base_url}editLibros"><img src="img/eddit.png" alt="Descripción de la imagen" width= "50px" height= "50px"></a> 
            </picture>
        </div>
        
        <div class= "col-md-3">
            <p class= "paragrauth">Agregar un nuevo autor</p>
            <picture>
                <a href="{$base_url}agregarAutor"><img src="img/autor.jpg" alt="Descripción de la imagen" width= "50px" height= "50px"></a> 
            </picture>
        </div>

        <div class= "col-md-3">
            <p class= "pareditauth">Eliminar o editar autores existentes</p>
            <picture>
              <a href="{$base_url}editAutor"><img src="img/eliminarAutor.jpg" alt="Descripción de la imagen" width= "50px" height= "50px"></a> 
            </picture>
        </div>
  </div>

  <div>
    <a href="todosUsers">Ver todos los usuarios</a>
  </div>