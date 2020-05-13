{include 'navAdmin.tpl'}

<div class= "container admin">
  <h1>Zona de administración</h1>

  <h3> Seleccione la acción que desea realizar </h3>

  <div class= "row">

    <div class= "col-xs-3 divagrbook">
      <p class= "paragrbook">Añadir un nuevo libro</p>
      <picture>
        <a href="{$base_url}nuevoLibro"><img src="img/addbook.jpg" alt="Descripción de la imagen" ></a> 
      </picture>
    </div>

    <div class= "col-xs-3">
      <p class= "pareditbook">Eliminar o editar libros existentes</p>
      <picture>
        <a href="{$base_url}editDB"><img src="img/eddit.png" alt="Descripción de la imagen" ></a> 
      </picture>
    </div>
  </div>
</div>

{include 'footer.tpl'}