<aside id="sidebar">
    <div id="opciones" class="block">
        <p>Registro de Usuarios</p>
        <form action="broker.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name ="email"/>
            <label for="user">Usuario</label>
            <input type="text" id="user" name ="user"/>
            <label for="Apat">Paterno</label>
            <input type="text" id="Apat" name ="Apat"/>
            <label for="Amat">Materno</label>
            <input type="text" id="Amat" name ="Amat"/>
            <label for="Nomb">Nombre</label>
            <input type="text" id="Nomb" name ="Nomb"/>
            <label for="pass">Password</label>
            <input type="password" id="pass" name ="pass"/>
            <input type="hidden" name="uriPage" id="uriPage" value="insUser"/>
            <input type="submit" id="enviar" name="enviar" value="Enviar"/>
        </form>
    </div>
</aside>