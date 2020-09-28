<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#">Bienvenid@  <?php echo $_SESSION['nombreUsuario'] ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li> <a class="navbar-brand" href="#">Tiendas</a></li>
      <li><a class="navbar-brand" href="#">Productos</a></li>
      <li><a class="navbar-brand" href="#">Pedidos</a></li>
      <li><a class="navbar-brand" href="rpedido.php">Realizar Pedidos</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>