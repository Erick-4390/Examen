<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#">Bienvenid@ <?php echo $_SESSION['nombreUsuario'] ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a class="navbar-brand" href="pedidos.php">Pedidos</a></li>
      <li><a class="navbar-brand" href="productos.php">Productos</a></li>
      <li><a class="navbar-brand" href="usuarios.php">Usuarios</a></li>
      <li><a class="navbar-brand" href="proveedores.php">Proveedores</a></li>
      <li><a class="navbar-brand" href="sesiones.php">Control de Sesiones</a></li>
      <li><a class="navbar-brand" href="rusuarios.php">Nuevo Usuario</a></li>
      <li><a class="navbar-brand" href="rproductos.php">Nuevo Producto</a></li>
      <li><a class="navbar-brand" href="rcategoria.php">Nueva Categoria Producto</a></li>
      <li><a class="navbar-brand" href="rproveedores.php">Nuevo Proveedor</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>