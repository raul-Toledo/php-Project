<?php require_once 'function/functionDB.php';?>
<?php require_once 'function/function.php';?>
<!-- HEADER-->
<?php require_once 'include/header.php'; ?>
<!-- Barra Lateral-->
<?php require_once 'include/sidebar.php'; ?>
<!-- Caja Principal -->
<div id="content">
<?php
    $query = "CALL selUsuario();";
    $con = dbCon();
    $dataSet = mysqli_query($con, $query);?>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>    
     <?php
    while($row = mysqli_fetch_assoc($dataSet)){
        echo "<tr>";
        echo"<th scope='row'>".$row["strLogin"]."</th>";
        echo "<td>".$row["strApat"]." ".$row["strAmat"]." ".$row["strNombre"]."</td>";
        echo "<td>".$row["strEmail"]."</td>";
        echo "<td>UPD | Del</td>";
        echo "</tr>";
    }?></tbody>
    </table>
</div>    
<!-- FOOTER -->
<?php require_once 'include/foot.php'; ?>

