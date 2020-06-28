{include 'navPublic.tpl'}

<h1> Complete todos los campos para poder registrarse </h1>


<form method="POST" action="registerComplete" class="col-md-4 offset-md-4 mt-4">

        <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" autocomplete="none">
        </div>

        <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Ingrese su apellido" autocomplete="none">
        </div>


        <div class="form-group">
            <input type="email" name="mail" class="form-control" placeholder="Ingrese email" autocomplete="none">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
        </div>

        <input type="submit" class="btn btn-primary" value="Completar registro"/>
    </form>