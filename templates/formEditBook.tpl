 {include 'navAdmin.tpl'}

<div class= "container formAgregar">
  <h1>Editar libro {$id->nombre}</h1>

<form action='guardarCambiosLib/{$id->id_libro}' method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Nombre del libro</label>
      <input type="text" name="nombreLibro" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Género</label>
      <input type="text" name="genero" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Sinopsis</label>
      <input type="text" name="sinopsis" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Año</label>
      <input type="number" name="anio" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Imagen</label>
      <input type="text" name="imagen" class="form-control" id="exampleInputPassword1">
    </div>
      <div class="form-group">
      <label for="exampleFormControlSelect1">Seleccione autor</label>
      <select class="form-control" name="autor" id="exampleFormControlSelect1">
          <option select>Seleccionar autor</option>
        {foreach $autor item=autores}
          <option value={$autores->id_autor}>{$autores->nombre}</option>
      </div>
        {/foreach}
    <input type="submit" value="Guardar cambios" class="btn btn-primary btnGuardarCambios">
</form>