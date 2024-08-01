<?php
include("admin/bd.php");
include("admin/templates/head1.php");


//Seleccionar registros
$sentencia=$conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchALL(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
      
        <!-- Content section-->
        <section class="py-5">
        <?php foreach($lista_servicios as $registros){ ?>
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas <?php echo $registros["icono"];?> fa-stack-1x fa-inverse"></i>
                        <h4><?php echo $registros["titulo"];?></h4>
                        <p class="lead"><?php echo $registros["descripcion"];?></p>
                        <!-- <p class="mb-0">I can't tell you how many people say they were turned off from science because of a science teacher that completely sucked out all the inspiration and enthusiasm they had for the course.</p> -->
                    </div>
                    <?php }?>
                </div>
            </div>
        </section>
     
        <?php include("admin/templates/foot1.php");?>