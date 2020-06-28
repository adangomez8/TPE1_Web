{include 'navPublic.tpl'}

<form method="POST" action="verifyUser" class="col-md-4 offset-md-4 mt-4">

        <div class="form-group">
            <input type="email" name="mail" class="form-control" placeholder="Ingrese email" autocomplete="none">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
        </div>

        {if $error}
        <div class="alert alert-dark">
            {$error}
        </div>
        {/if}

        <input type="submit" class="btn btn-primary" value="Iniciar sesión"/>
    </form>

