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
            <!-- Header - set the background image for the header in the line below-->
        <header class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/4ulffa6qoKA/1200x800')">
            <div class="text-center my-5">
                <img src = "assets/logosur.jpg" width="100" height="100" alt="" />
                <h1 class="text-white fs-3 fw-bolder">Bienvenido a Sur Records</h1>
                <p class="text-white-50 mb-0">Pronto sabras mas de nosotros</p>
            </div>
        </header>
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2>Sobre Sur Records</h2>
                        <p class="lead">Sur Records es una Productora Musical que cuenta con un estudio de grabación de alta gama tecnológica, donde se ofrecen servicios de producción musical, grabación, mezcla, masterización, audio y composición musical para spot publicitarios, producciones audiovisuales, músicos y artistas.</p>
                        <p class="mb-0">También ofrece como productos una extensa biblioteca de samples originales de los que destaca una serie única dedicada a instrumentos membranófonos, propios de la música tradicional afrovenezolana, titulado "Tambores de Venezuela"</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="py-5 bg-image-full" style="background-image: url('assets/Fullblack.jpg')">
       <div style="text-align:center"> <img src = "assets/logosur.jpg" width="100" height="100" alt="" />
       <p class="text-white-50 mb-0"> Aqui obtendras mas información sobre nuestros artistas</p>
    </div>
  
    </div>
       
        <!-- Content section-->
        <section>
        <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2>Servicios</h2>
                        <p class="lead">Aqui puedes obetener mas informacion sobre la amplia gama de servicios que nosotros ofrecemos. </p>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="servicios.php">Saber Mas.</a></li>
                        
                    </div>
                </div>
            </div>
        </section>

<?php include("admin/templates/foot1.php");?>
