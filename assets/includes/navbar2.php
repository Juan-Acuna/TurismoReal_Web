<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right " style="margin-top:40px" id="sidebar-wrapper">
  <div class="sidebar-heading">Contenidos </div>
  <div class="list-group list-group-flush">
  <a href="<?php echo GESTION;?>/vermulta.php" class="list-group-item list-group-item-action bg-light">Ver Multas</a>
    <a href="<?php echo GESTION;?>/verreservas.php" class="list-group-item list-group-item-action bg-light">Ver Reservas</a>
    <a href="<?php echo GESTION;?>/verservicio.php" class="list-group-item list-group-item-action bg-light">Ver Servicio</a>
    <a href="<?php echo GESTION;?>/vertransporte.php" class="list-group-item list-group-item-action bg-light">Ver Transporte</a>
    <a href="<?php echo GESTION;?>/checkin" class="list-group-item list-group-item-action bg-light">CHECK IN</a>
    <a href="<?php echo GESTION;?>/checkout" class="list-group-item list-group-item-action bg-light">CHECK OUT</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper"class="mt-1 ">

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mt-3">
    <button class="btn btn-primary" id="menu-toggle">Sidebar</button>



  </nav>
  
</div>
<!-- /#page-content-wrapper -->


</div>
<!-- /#wrapper -->
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>  

<!-- Bootstrap core JavaScript -->
<script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
<script src="<?php echo JS;?>/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>