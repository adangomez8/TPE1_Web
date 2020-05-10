<div class= "container admin">
  <h1>Zona de administración</h1>

  <h3> Seleccione la acción que desea realizar </h3>

  <div class= "row">
    <div class= "col-xs-3">
      <p>Añadir un nuevo libro</p>
      <picture>
        <a href="{$base_url}nuevoLibro"><img src="img/add.jpg" alt="Descripción de la imagen" ></a> 
      </picture>
    </div>

    <div class= "col-auto ">
      <p>Eliminar o editar libros existentes</p>
      <picture>
        <a href="{$base_url}editDB"><img src="img/eddit.png" alt="Descripción de la imagen" ></a> 
      </picture>
    </div>
  </div>
</div>

{include 'footer.tpl'}