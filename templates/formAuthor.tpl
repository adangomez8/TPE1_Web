{include 'navAdmin.tpl'}

<h1> Ingrese los datos para agregar un nuevo autor </h1>

<form action="newAuthor" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre del autor</label>
    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Foto del autor</label>
    <input type="text" name="foto" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

{include 'footer.tpl'}