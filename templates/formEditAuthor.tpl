{include 'navAdmin.tpl'}

<h1>Modificar autor </h1>

<div class= "container formAgregar">
  <h1 class="titAgreAut"><b>AGREGAR AUTOR</b></h1>

  <form action="cambioAutor/{$autor->id_autor}" method="POST">

    <div class="form-group">
      <input type="text" name="nombre" value="{$autor->nombre}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
    </div>
    
    <div class="form-group">
      <input type="text" name="foto" value="{$autor->foto}" class="form-control" id="exampleInputPassword1" autocomplete="off">
    </div>
    <input type="submit" value="Guardar nuevo autor" class="btn btn-secondary btn-lg btn-block btnGuardarNuevoAut">
  </form>
</div>

{include 'footer.tpl'}
