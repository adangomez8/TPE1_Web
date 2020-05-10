<h1>Agregar libro</h1>

<form action='addBook' method="POST">
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
    <select class="form-control" id="exampleFormControlSelect1">
{foreach $id item=autores}
      <option>{$autores->nombre}</option>
  </div>
{/foreach}
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include 'footer.tpl'}