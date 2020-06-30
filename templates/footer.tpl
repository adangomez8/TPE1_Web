</div>          
</body>
   </html>


    <footer>
       <div class="footer">
           <label for=""><img src="img/icono.jpg" alt="" width= "15px" height= "15px"></label>
           <a href="home">Librería</a>
           {if $user}
           <a href="logoutUser"> - Cerrar Sesión</a>
           <p class="nombreusuario"><label for="">{$user["username"]} {$user["usersurname"]}</label></p>
           {/if} 
           <p><a href="mostrarLibros">Ver todos nuestros libros</a></p>  
       </div>
    </footer>