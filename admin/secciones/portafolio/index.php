<?php 

include("../../bd.php");

$sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchALL(PDO::FETCH_ASSOC);


include("../../templates/header.php"); ?>
<div class="card">
    <div class="card-header"> <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a> </div>
    <div class="card-body">
        



<div
    class="table-responsive-sm"
>
    <table
        class="table"
    >
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Subtitulo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cliente</th>
                <th scope="col">Categoria</th>
                <th scope="col">url</th>

            </tr>
        </thead>
        <tbody>
            <tr class="">
            <th scope="col">1</td>
                <td scope="col">Software de restaurante</td>
                <td scope="col">Software para su restaurante a al medida</td>
                <td scope="col">Imagen</td>
                <td scope="col">Software para su restaurante a la medida</td>
                <td scope="col">Sur Records</td>
                <td scope="col">http://develoteca.com/surrecords</td>
                <td scope="col">Editar|Eliminar</td>
            </tr>
            <tr class="">
            
            </tr>
        </tbody>
    </table>
</div>


    </div>
</div>

<?php include("../../templates/footer.php"); ?>