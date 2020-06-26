 {include 'navAdmin.tpl'}

<div class= "container formAgregar">
  <h1>Editar libro {$info->nombre}</h1>

  {if $error}
      <div class="alert alert-warning" role="alert">
          {$error}
      </div>
  {/if}

<form action='guardarCambiosLib/{$info->id_libro}' method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">Nombre del libro</label>
      <input type="text" name="nombreLibro" value="{$info->nombre}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Género</label>
      <input type="text" name="genero" value="{$info->genero}" class="form-control" id="exampleInputPassword1" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Sinopsis</label>
      <input type="text" name="sinopsis" value="{$info->sinopsis}" class="form-control" id="exampleInputPassword1" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Año</label>
      <input type="number" name="anio" value="{$info->anio}" class="form-control" id="exampleInputPassword1" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Imagen</label>
      <input type="file" name="imagen" value="{$info->imagen}" class="form-control" id="imageToUpload">
    </div>
      <div class="form-group">
      <label for="exampleFormControlSelect1">Seleccione autor</label>
      <select class="form-control" name="autor" id="exampleFormControlSelect1">
          <option select></option>
        {foreach $autor item=autores}
          <option value={$autores->id_autor}>{$autores->nombre}</option>
      </div>
        {/foreach}
      
      
    <input type="submit" value="Guardar cambios" class="btn btn-primary btnGuardarCambios">
</form>